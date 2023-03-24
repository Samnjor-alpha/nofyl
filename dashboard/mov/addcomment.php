<div class="modal  fade" id="viewoutcome" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="dname" class="modal-title">Add Comment</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  class="modal-body">
                <form method="post" action="" class="">
                    <input  type="hidden" name="mov_id" id="idd">
                    <div class="form-group">
                        <label>Comment:</label>
                        <textarea name="comment" class="form-control" id="comment"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" name="add_mov_cmnt" class="btn btn-sm btn-success">Add Comment</button>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

    function add_row() {
        $rowno = $("#employee_table tr").length;
        $rowno = $rowno + 1;
        $("#employee_table tr:last").after("<tr style='margin-top:10px; padding-top:10px;float: left;' id='row" + $rowno + "'><td style='width:50%;padding-left:3.5%;'><br><label style='position: relative;top: -52px;'>Primary Cluster:</label></td><td style='padding-left:8%;'><textarea id='' name='cluster_name[]' rows='2' cols='85' placeholder='Cluster Name'></textarea> <br><br> <label>Sub Cluster</label> <textarea id='' name='sub_cluster_name[]' rows='2' cols='50' placeholder='Sub Cluster Name'></textarea><br><br>  <label>Percentage</label><input type='number' id='' name='cluster_perc[]' placeholder='%' /></td><td><input type='button' value='X' class='col2-buttonX' onclick=delete_row('row" + $rowno + "')></td></tr>");
    }

    function delete_row(rowno) {
        $('#' + rowno).remove();
    }


    $(document).ready(function(){
        $("#updatedriver").modal({
            keyboard: true,
            show: false,

        }).on("show.bs.modal", function(event){
            var button = $(event.relatedTarget); // button the triggered modal
            var tripid = button.data("id");



            //displays values to modal

            $(".modal-body #id").val( tripid );

        });
        $("#viewdriver").modal({
            keyboard: true,
            show: false,

        }).on("show.bs.modal", function(event){
            var button = $(event.relatedTarget); // button the triggered modal
            var id = button.data("id");
            var dname = button.data("dname");



            //displays values to modal

            $(".modal-body #id").val( id );
            $(".modal-body #id").val( id );
            $(".modal-body #name").val( dname );

        });
        $("#viewoutcome").modal({
            keyboard: true,
            show: false,

        }).on("show.bs.modal", function(event){
            var button = $(event.relatedTarget); // button the triggered modal
            var id = button.data("id");
            var dname = button.data("outcome");



            //displays values to modal

            $(".modal-body #id").val( id );
            $(".modal-body #idd").val( id );

            $(".modal-header #dname").text( "Add comment")


        });

    });



</script>