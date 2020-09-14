<div class="container">
  <h2>Branches</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Sl No.</th>
        <th>Branch</th>
        
      </tr>
    </thead>
    <tbody>
    <?php //TO VIEW BRANCHES
                         $i=1;
                         foreach($branchDetail->result_array() as $row)
                         {
                           
                           
                        ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row['branch_name'];?></td>
        
      </tr>
      <?php
      $i++;
                         }

      ?>
      
    </tbody>
  </table>
</div>
