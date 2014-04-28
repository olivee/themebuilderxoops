<?php
define('CE_VARNAME', 0);
define('CE_VARVALUE', 1);
define('CE_VARCOMMENT', 2);
// CE_NEWLINE contains the new-line sequence.
// It may be defined prior to including this file
if (!defined('CE_NEWLINE')) define('CE_NEWLINE', "\n");
// CE_WORDWRAP specifies line width for comments
// It may be defined prior to including this file
if (!defined('CE_WORDWRAP')) define('CE_WORDWRAP', 40);


/**
* ConfigEditor class allows you to create/edit config files
* which are includable PHP-scripts
* 
* @package ConfigEditor
* @author Alexandr [Amega] Egorov, amego2006(at)gmail.com
* @version 1.0
*/
class ConfigEditor
{
    /**
    * @var Array containing all variables. Each entry of the array
    * is an associative array:
    *   [CE_VARNAME] => variable name
    *   [CE_VARVALUE] => variable value in RAW format (everything from '=' till ';' in source config)
    *   [CE_VARCOMMENT] => comment associated with the variable
    */
    private $vars;

    /**
    * Loads (parses) a given config file
    * 
    * @param string A path to the file
    * @exception An exception is thrown if the file could not be read
    */
    public function LoadFromFile($fname) {
        $str = @file_get_contents($fname);
        if ($str === false) {
            throw new Exception("Error reading source file ".$fname);
        }
        if ($str === false) return false;
        else return $this->LoadFromStr($str);
    }
    
    /**
    * Parses the given string
    * 
    * @return boolean true on success, false on falure
    */
    public function LoadFromStr($src) {
        $tokens = token_get_all($src);
        $current_var = array(CE_VARNAME => false,
                            CE_VARVALUE => false,
                            CE_VARCOMMENT => '');
        $this->vars = array();
        
        foreach ($tokens as $token) {
            // Most of the tokens are arrays: [0] => type, [1] => value
            if (is_array($token)) {
                $t_type = $token[0];
                $t_val = $token[1];
				
                // If we find a comment - append it to current variable's comment
                if ($t_type == T_COMMENT) {
                    $current_var[CE_VARCOMMENT] .= self::unformatComments($t_val).CE_NEWLINE;
                }
                elseif ($t_type == T_VARIABLE) {
                        // If varname is not set already, this is a new var
                        if ($current_var[CE_VARNAME] === false) {
                            $current_var[CE_VARNAME] = substr($t_val, 1);
							//var_dump($current_var[CE_VARNAME]);
							//var_dump($t_type);
                        // otherwise, this var is part of the current
                        // variable value, e.g.:
                        // $var2 = "Some text $var1.";
                        } elseif ($current_var[CE_VARVALUE] !== false) {
                            $current_var[CE_VARVALUE] .= $t_val;
                        }
                }
                // Other tokens should be treated as var value, but only if they
                // follow after corresponding '='. So, before the first '='
                // $current_var[CE_VARVALUE] === false;
                elseif ($current_var[CE_VARVALUE] !== false) $current_var[CE_VARVALUE] .= $t_val;
				//elseif ($t_val == '$test') $current_var[CE_VARVALUE] .= '';
				
            } else {
                if ($token === '=') {
                    // If this is the first '=' for current variable,
                    // we just initialize $current_var[CE_VARVALUE]
                    if ($current_var[CE_VARVALUE] === false) {
                        $current_var[CE_VARVALUE] = '';
                    // Otherwise, this '=' is a part of the value
                    } else {
                        $current_var[CE_VARVALUE] .= $token;
                    }
                }
                // ';' indicates the end of current variable
                elseif ($token === ';') {
                    if ($current_var[CE_VARNAME] && $current_var[CE_VARVALUE] !== false) {
                        $current_var[CE_VARVALUE] = ltrim($current_var[CE_VARVALUE]);
                        $this->vars[$current_var[CE_VARNAME]] = $current_var;                
                    }
                    $current_var = array(CE_VARNAME => false,
                                        CE_VARVALUE => false,
                                        CE_VARCOMMENT => '');
                }
                elseif ($current_var[CE_VARVALUE] !== false) {
                    $current_var[CE_VARVALUE] .= $token;
                }
            }
        }
        return true;
    }
    
    /**
    * Get the list of variables
    * 
    * @return array List of variables
    */
    public function GetVarNames() {
        return array_keys($this->vars);
    }
    
    /**
    * Get the specified variable
    * 
    * @param string Variable name
    * @return array The function returns an array containing variable info:
    *   [CE_VARNAME] => variable name
    *   [CE_VARVALUE] => variable value
    *   [CE_VARCOMMENT] => variable comments
    * @exception An exception is thrown if variable does not exist
    */
    public function GetVar($var_name) {
        // First get the var in RAW format
        $var = $this->GetVarRaw($var_name);
        // Then evaluate the value
        $ret = @eval('return '.$var[CE_VARVALUE].';');
        $var[CE_VARVALUE] = $ret;
        return $var;
    }
    
    /**
    * Get the specified variable. Same as GetVar($var_name)
    * but the var value is in RAW format
    * 
    * @param string Variable name
    * @return array The function returns an array containing variable info:
    *   [CE_VARNAME] => variable name
    *   [CE_VARVALUE] => variable value in RAW format
    *   [CE_VARCOMMENT] => variable comments
    * @exception An exception is thrown if variable does not exist
    */
    public function GetVarRaw($var_name) {
        if (isset($this->vars[$var_name])) return $this->vars[$var_name];
        else throw new Exception("No such variable in config");
    }
    
    /**
    * Changes the variable. If the variable does not exist yet
    * the function will add it.
    * 
    * @param string Variable name
    * @param mixed Variable value
    * @param string Variable comments
    * @param boolean True, if the value is in RAW format. False otherwise (default)
    * @exception An exception is thrown if variable name is not correct
    */
    public function SetVar($var_name, $var_value, $var_comments='', $raw = false) {
        if (self::checkVarName($var_name)) {
            if (!$raw) {
                $var_value = var_export($var_value, true);
            } else {
                if (!self::checkVarRawValue($var_value)) {
                    throw new Exception("Error in raw value");
                }
            }
            
            $var = array (
                CE_VARNAME => $var_name,
                CE_VARVALUE => $var_value,
                CE_VARCOMMENT => $var_comments,
            );
            $this->vars[$var_name] = $var;
        } else {
            throw new Exception("Invalid variable name");
        }        
    }

    /**
    * Deletes specified variable
    * 
    * @param string Variable name
    * @return true, if variable was deleted; false if variable did not exist
    */
    public function DeleteVar($var_name) {
        if (isset($this->vars[$var_name])) {
            unset($this->vars[$var_name]);
            return true;
        } else {
            return false;
            //throw new Exception("No such variable in config");
        }
    }
    /**
    * Checks variable name
    * 
    * @param string Variable name
    * @return true if the name is correct; false otherwise.
    */
    private static function checkVarName($var_name) {
        // pattern taken from http://php.net/manual/en/language.variables.php
        static $p = '/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/i';
        return preg_match($p, $var_name);
    }
    
    /**
    * Function checks variable raw value
    * 
    * @param string RAW value (php code)
    * @return True, if the value is safe; false otherwise
    * @todo More checks
    */
    private static function checkVarRawValue($var_value) {
        //TODO: more checks ?
        $stuff = 'if (false) {'.$var_value.';}';
        if (@eval($stuff) === false) {
            return false;
        } else {
            return true;
        }
    }
    /**
    * Puts the passed string in "comments envelope".
    * 
    * @param string Plain text
    * @return string Formated comments
    * @example $str = formatComments("Line1\nLine2");
    * $str ==
    * // Line1
    * // Line2
    */
    private static function formatComments($comments) {
        // isset($str[0]) seems to be the fastest way to
        // determine whether the string is empty
        if (empty($comments)) return '';
        $lines = explode("\n", $comments);
        $output = '';
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;
            $output .= '// '.$line.CE_NEWLINE;
        }
        return $output;
    }
    
    /**
    * The mirror-function to formatComments:
    * extracts comments from the comment envelope
    * 
    * @param string PHP-comments
    * @return string Comments as a plain text
    * @example
    * $str = unformatComments("// Comment");
    * $str == 'Comment'
    */
    private static function unformatComments($comments) {
        if ($comments[0] === '/' && $comments[1] === '/') {
            // Cut first 2 bytes ('//');
            return trim(substr($comments, 2));
        } elseif ($comments[0] === '/' && $comments[1] === '*') {
            // Cut opening '/*' and closing '*/' "brackets"
            return trim(substr($comments, 2, strlen($comments) - 2));
        } elseif ($comments[0] === '#') {
            return trim(substr($comments, 1));
        } else {
            return '';
        }
    }
    
    /**
    * The function generates a config file.
    * 
    * @param string [optional] Filename where the function will attempt to save generated config.
    *   Note: the caller will not know if the file operation fails.
    * @return string Generated config file.
    */
    public function Save($fname = false) {
        $src = "<?php ".CE_NEWLINE;
        foreach ($this->vars as $var) {
            $src .= self::formatComments(wordwrap($var[CE_VARCOMMENT], CE_WORDWRAP, CE_NEWLINE));
            $src .= '$'.$var[CE_VARNAME].' = '.$var[CE_VARVALUE].';'.CE_NEWLINE.CE_NEWLINE;
			//$src .= '$thisassign = '."hhhhhhhh".';'.CE_NEWLINE.CE_NEWLINE;
        }
        $src .= '?>';
        
        if ($fname !== false) {
            $fp = @fopen($fname, 'w');
            if ($fp) {
                @fwrite($fp, $src);
                @fclose($fp);
            }
			
			//


        $src1 = "<?php ".CE_NEWLINE;
        foreach ($this->vars as $var) {
            $src1 .= self::formatComments(wordwrap($var[CE_VARCOMMENT], CE_WORDWRAP, CE_NEWLINE));
            $src1 .= '$'.$var[CE_VARNAME].' = '.$var[CE_VARVALUE].';'.CE_NEWLINE.CE_NEWLINE;
			$src1 .= '$this -> assign ( "'.$var[CE_VARNAME].'", '.$var[CE_VARVALUE].');'.CE_NEWLINE.CE_NEWLINE;

			//$this -> assign( '.$var[CE_VARNAME].', $var[CE_VARVALUE] );
        }
        $src1 .= '?>';
define('ROOTDIR1', dirname(__FILE__));
define('LIBDIR1', ROOTDIR1);
define('CONFIG_FILE1', ROOTDIR1.'/../config1.inc.php');		
			$fname1 = CONFIG_FILE1;
            $fp1 = @fopen($fname1, 'w');
            if ($fp1) {
                @fwrite($fp1, $src1);
                @fclose($fp1);
            }			
			
			
			//
			
			
        }
        return $src;
    }
}

?>