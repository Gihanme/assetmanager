<table id="datatable" class="table table-striped table-bordered">
                    <thead>                      
                    </thead>
                    <tbody>
                        <tr>
                            <td align="style="justify><strong >&nbsp;&nbsp;Asset name </strong></td>
                            <td><input type="text" class="form-control" value="" name="name" id="name"><span class="error"> <?php echo $itemNameErr;?></span>
  <br><br></td>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Asset Type </strong></td>
                            <td>
                                <select class="form-control" name="type">
                                    <?php 
                                        while($div = $types->fetch_assoc()){
                                            echo "<option value='".$div['asset_type_id']."'>".$div['asset_type']."</option>";
                                        }?>
                                </select>
                            </td>   
                        </tr>	
                        <tr>
                            <td align="style="><strong >&nbsp;&nbsp;Model Number </strong></td>
                            <td><input type="text" class="form-control" value="" name="model"/><span class="error"><?php echo $modelNoErr;?></span><br><br></td>
                            <td align="style="><strong >&nbsp;&nbsp;Item Category </strong></td>
                            <td>
                                <select class="form-control" name="category">
                                    <?php 
                                        while($cate = $cats->fetch_assoc()){
                                            echo "<option value='".$cate['asset_category_id']."'>".$cate['asset_category']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Barcode No </strong></td>
                            <td><input type="text" class="form-control" value="" name="barcode"/><span class="error"><?php echo $barcodeErr;?></span><br><br></td>
                            <td align="style="justify"><strong >&nbsp;&nbsp; Cost </strong></td>
                            <td><input type="text" class="form-control" value="" name="price"/><span class="error"><?php echo $costErr;?></span><br><br></td>      
                        <tr>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Serial No </strong></td>
                            <td><input type="text" class="form-control" value="" name="serial"/></td>
                            <td align="style="justify"><strong >&nbsp;&nbsp;Brand </strong></td>
                            <td><input type="text" class="form-control" value="" name="brand"/><span class="error"><?php echo $brandErr;?></span><br><br></td>   
                        </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Vendor </strong></td>
                    <td><input type="text" class="form-control" value="" name="vendor"/><span class="error"><?php echo $vendorErr;?></span><br><br></td>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Vendor Address</strong></td>
                    <td><input type="text" class="form-control" value="" name="vendor_add"/><span class="error"><?php echo $vendorAddErr;?></span><br><br></td>

                </tr>
				
				<tr>
                    <td align="style="justify"><strong >&nbsp;&nbsp;Division</strong></td>
                    <td><select class="form-control" name="division"   onchange="fetch_select(this.value);">
                            <?php 
                                while($div = $divisions->fetch_assoc()){
                                    echo "<option value='".$div['Division_Code']."'>".$div['Division_Name']."</option>";
                                }?>
                        </select></td> 
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Room </strong></td>
                    <td><select class="form-control" name="room" id="new_select">
                            
                        </select></td>   
                </tr>				
				<tr>
                    
                    <td align="style="justify"><strong >&nbsp;&nbsp;Depreciation </strong></td>
                    <td><input type="text" class="form-control" value="" name="deprec"/></td>
		                                <td align="style="justify"><strong >&nbsp;&nbsp;Warranty Period  </strong></td>
                    <td>          
                
            <input type="text" name="datefilter" value="" class="form-control" required/>
        								
                
				</tr>
                                

                    	
            </tbody>
    </table>