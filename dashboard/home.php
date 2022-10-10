<?php
include '../config/config.php';
include '../controllers/auth.php';
include '../controllers/session.php';
include '../controllers/helper.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NoFYl</title>
<?php include '../css/header.php'?>
</head>
<body>

<?php include 'navbar/topbar.php'?>
<div class="container mt-3">
    <h2>        NoFYL Project Documentation Portal
       </h2>
    <?php include 'navbar/tabs.php'?>
</div>
<div class="container  mb-5 mt-2">



    <!-- Horizontal Form -->
    <div class="mt-4">
    <form>
        <div class="row ">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Organization:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row ">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Allocation:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row ">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Project Title:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row ">
            <label for="inputEmail3" class="col-sm-5  col-form-label">
                Project Fund Code:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row ">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Project Start Date:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row ">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Project End  Date:</label>
            <div class="col-sm-4">
                <input type="text" class="" id="inputText">
            </div>
        </div>
        <div class="row " id="dynamic_field">
            <label for="inputEmail3" class="col-sm-5  col-form-label">Primary Cluster:</label>
            <div class="col-sm-4">
                <textarea  class="" id="inputText"></textarea>
            </div>

            <label for="inputEmail3" class="offset-5  col-form-label">Sub Cluster:</label>
            <div class="offset-5 col-sm-4">
                <textarea  class="" id="inputText"></textarea>
            </div>
            <label for="inputEmail3" class="offset-5  col-form-label">Percentage:</label>
            <div class="offset-5 col-sm-4">
                <input type="number"   placeholder="%" class="" id="inputText"/>
            </div>
            <div class="offset-10">
                <button type="button" name="add" id="add" class="btn btn-secondary">Add Another primary Cluster</button>
            </div>


        </div>
        <button name="submit" style="width:20%; height:50px; margin-top:20px; background:#075f96; color:#fff; border:none;">Create Project</button>
    </form>

</div>

</div>
<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<div class="row " id="row'+i+'">' +

                '<label for="inputEmail3" class="col-sm-5  col-form-label">Primary Cluster:</label><div class="col-sm-4"><textarea  class="" id="inputText"></textarea></div>' +
                '<label for="inputEmail3" class="offset-5  col-form-label">Sub Cluster:</label><div class="offset-5 col-sm-4"><textarea  class="" id="inputText"></textarea></div>' +
                '<label for="inputEmail3" class="offset-5  col-form-label">Percentage:</label><div class="offset-5 col-sm-4"><input type="number"   placeholder="%" class="" id="inputText"/></div>' +
                '<div class="offset-10"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
        $('#submit').click(function(){
            $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    });
</script>
</body>
</html>


