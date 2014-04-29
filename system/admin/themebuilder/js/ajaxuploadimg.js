$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		var x = $('#location').val();
		
		
		new AjaxUpload(btnUpload, {
			// Arquivo que fará o upload
			action: 'admin/themebuilder/upload-file.php',
			//Nome da caixa de entrada do arquivo
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 //if (!(ext && /^(ico|jpg|png|jpeg|gif)$/.test(ext))){
				 if (!(ext && /^(ico)$/.test(ext))){ 
					alert('Only ICO files are allowed');
					return false;
				}
				status.text('Uploading...');
			$('#status').show();
			},
			onComplete: function(file, response){
				status.text('');
				//if(response==='success'){
				if (response != 'error'){
					//$('<li></li>').appendTo('#files').html('<img src=uploads/'+file+' />'+file).addClass('success');
					$('<li></li>').appendTo('#files').html('<img src=../../uploads/'+response+' />'+response).addClass('success');
					$('#fav_ico').val(''+x+'/uploads/'+response+'');
					status.text('');
					$('#status').hide();
					$('#upload').hide();

				} else{
					alert('File '+file+' do not load...');	
					$('<li></li>').appendTo('#files').text(file).addClass('error');
					status.text('Probleme upload...');
			
				}
			}
		});
		
});

	$(function(){
		var btnUpload=$('#upload1');
		var status=$('#status1');
		var x = $('#location1').val();
		
		new AjaxUpload(btnUpload, {
			// Arquivo que fará o upload
			action: 'admin/themebuilder/upload-file.php',
			//Nome da caixa de entrada do arquivo
			name: 'uploadfile',
			onSubmit: function(file, ext){
				//if (!(ext && /^(ico|jpg|png|jpeg|gif)$/.test(ext))){ 
				 if (!(ext && /^(png)$/.test(ext))){ 
					alert('Only PNG files are allowed');
					return false;
				}
				status.text('Uploading...');
			$('#status1').show();
			},
			onComplete: function(file, response){
				status.text('');
				//if(response==='success'){
				if (response != 'error'){
					//$('<li></li>').appendTo('#files').html('<img src=uploads/'+file+' />'+file).addClass('success');
					$('<li></li>').appendTo('#files1').html('<img src=../../uploads/'+response+' />'+response).addClass('success');

					$('#fav_ico_img').val(''+x+'/uploads/'+response+'');
					status.text('');
					$('#status1').hide();
					$('#upload1').hide();

				} else{
					alert('File '+file+' do not load...');	
$('<li></li>').appendTo('#files1').text(file).addClass('error');
status.text('Probleme upload...');
			
				}
			}
		});
		
	});

