<html>
<?php $this->load->view("header_view");?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script>
$(document).ready(function(){
  $("#jquery_link a").click(function(){
    var url = $(this).attr("href");
    $.ajax({
      type: "POST",
      url: url,
      data: "ajax",
      async: true,
      beforeSend: function(){
        $("#content").html("");
      },
      success: function(kq){
        $("#content").html(kq);
      }
    })
    return false;
  });
})
</script>


<style>
#jquery_link{
  margin-top:5px;
}
</style>
</head>

<body>
<div id="content">
  <?php $this->load->view("menu_view");?>
  <table align="center" width="250" class="table  table-condensed">
    <tr>
      <td>STT</td>
      <td>Produc name</td>
      <td>Category Name</td>
      <td>Product Date</td>
      <td>Expiry Date</td>
    </tr>
    <?php
      $stt = 0;
      foreach($info as $item){
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$item[product_name]</td>";
        echo "<td>$item[category_name]</td>";
        echo "<td>$item[product_date]</td>";
        echo "<td>$item[expiry_date]</td>";
        echo "</tr>";
      }
    ?>
  </table>
  <div id="jquery_link" align="center">
    <?php echo $pagination;?>
  </div>
</div>
</body>
</html>