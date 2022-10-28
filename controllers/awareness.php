<?php
if (isset($_GET['id'])&&!empty($_GET['id'])) {
    $awareness=mysqli_query($conn,"select * from awareness where indicator_id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_assoc($awareness);
    if (mysqli_num_rows($awareness)>0) {
        if (isset($_POST['saveReport'])) {
            $title=$_POST['title'] ?? null;
            $fromDate=date('Y-m-d',strtotime($_POST['from'])) ??null;
            $toDate=date('Y-m-d',strtotime($_POST['to'])) ??null;
            $outcome=$_POST['outcome']??null;
            $output=$_POST['output']??null;
            $target=$_POST['target']??null;
            $ind_target=$_POST['ind_target']??null;
            $cu_target=$_POST['cu_target']??null;
            $district=$_POST['district']??null;
            $men=$_POST['men']??null;
            $women=$_POST['women']??null;
            $boys=$_POST['boys']??null;
            $girls=$_POST['girls']??null;
            $awareness=$_POST['awareness']??null;
            $n_awareness=$_POST['n_awareness']??null;
            $achievements=$_POST['achievements']??null;
            $methodologies=$_POST['methodologies']??null;
            $aware_outcome=$_POST['aware_outcome']??null;

            $add= "update awareness set title='$title',
                          fromD='$fromDate',
                          toD='$toDate',
                          outcome='$outcome',
                          output='$output',
                          target='$target',
                          ind_target='$ind_target',
                          cu_reached='$cu_target',
                          district='$district',
                          women='$women',
                          men='$men',
                           boys='$men',
                           girls='$girls',
                           aim_aware='$awareness',
                           need_aware='$n_awareness',
                           achievements='$achievements',
                           methodologies='$methodologies',
                           outcomes='$aware_outcome' where
                           indicator_id='".$_GET['id']."'";
            if (mysqli_query($conn,$add)){
                $update=mysqli_query($conn, "UPDATE output_indicators set upload_status='1' where id='".$_GET['id']."'");
                echo "<script>
            alert('Report updated succcessfully');
            window.location.href = '../clusters.php?id=".getprojectid($_GET['id'])."';
</script>";

            }


        }
    }else{
        if (isset($_POST['saveReport'])) {
            $title=$_POST['title'] ?? null;
            $fromDate=date('Y-m-d',strtotime($_POST['from'])) ??null;
            $toDate=date('Y-m-d',strtotime($_POST['to'])) ??null;
            $outcome=$_POST['outcome']??null;
            $output=$_POST['output']??null;
            $target=$_POST['target']??null;
            $ind_target=$_POST['ind_target']??null;
            $cu_target=$_POST['cu_target']??null;
            $district=$_POST['district']??null;
            $men=$_POST['men']??null;
            $women=$_POST['women']??null;
            $boys=$_POST['boys']??null;
            $girls=$_POST['girls']??null;
            $awareness=$_POST['awareness']??null;
            $n_awareness=$_POST['n_awareness']??null;
            $achievements=$_POST['achievements']??null;
            $methodologies=$_POST['methodologies']??null;
            $aware_outcome=$_POST['aware_outcome']??null;

            $add= "insert into awareness set title='$title',
                          fromD='$fromDate',
                          toD='$toDate',
                          outcome='$outcome',
                          output='$output',
                          target='$target',
                          ind_target='$ind_target',
                          cu_reached='$cu_target',
                          district='$district',
                          women='$women',
                          men='$men',
                           boys='$men',
                           girls='$girls',
                           aim_aware='$awareness',
                           need_aware='$n_awareness',
                           achievements='$achievements',
                           methodologies='$methodologies',
                           outcomes='$aware_outcome',
                           indicator_id='".$_GET['id']."'";
            if (mysqli_query($conn,$add)){
                $update=mysqli_query($conn, "UPDATE output_indicators set upload_status='1' where id='".$_GET['id']."'");
                echo "<script>
            alert('Report submitted succcessfully');
            window.location.href = '../clusters.php?id=".getprojectid($_GET['id'])."';
</script>";

            }


        }
    }

}else{
    echo "<script>
alert('Data wont be recorded');
            
</script>";

}