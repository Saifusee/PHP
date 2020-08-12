</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="./includes/ckeditor/ckeditor.js"></script>
    <!-- <script>//if you want to use ckeditor for youor code use this
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script> -->
<script>//if you want to use tinymce editor use this code
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
  <script src="includes/checkbox.js"></script>
  <script> 
 function loadUsersOnline () {
    $.get("includes/admin_function.php?onlineusers=result",function(data){
      $(".usersonline").text(data);
    });
  }
  setInterval(function(){
    //loadUsersOnline();

  },500);
    </script>

  <!--css of loading of admin section-->
<!-- <script>$('#load-screen').delay(700).fadeOut(600, function(){
        $(this).remove();
    $() })</script> -->

</body>

</html>
