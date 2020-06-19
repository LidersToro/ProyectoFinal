 <?php  
 //load_data.php  
 session_start();
 $abc = $_SESSION['id'];
 $connect = mysqli_connect("localhost", "root", "", "bd_proyectofinal"); 
 $output = '';  
 if(isset($_POST["idCategoria"]))  
 {  
      if($_POST["idCategoria"] != '')  
      {  
           $sql = "SELECT * FROM producto WHERE idCategoria = '".$_POST["idCategoria"]."' AND idEmpresa= '".$abc."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM producto where idEmpresa = '$abc'";  
      }  
      $result = mysqli_query($connect, $sql);
print "                            <table class=\"table table-hover table-striped\">\n";
print "                                <thead>\n";
print "                                    <th>ID</th>\n";
print "                                    <th>Logo</th>\n";
print "                                    <th>Nombre</th>\n";
print "                                    <th>Descripcion</th>\n";
print "                                    <th>Precio</th>\n";
print "                                </thead>\n";
print "                                <tbody>\n";  
      while($row = $result->fetch_row())  
      {  
        $output .= "<tr>\n";
        $output .= "<td>$row[0]</td>\n";
        $output .= ' <td><img src="data:image/jpeg;base64,'.base64_encode( $row[4] ).'"height="200" width="200" class="img-thumnail"/></td>';
        $output .= "<td>$row[1]</td>\n";
        $output .= "<td>$row[2]</td>\n";
        $output .= "<td>$row[3]</td>\n";
        $output .= "<td style='display:none;'>$row[5]</td>\n";
        $output .= "<td style='display:none;'>$row[6]</td>\n";
        $output .= "<td class=\"td-actions text-right\">\n";
        $output .= " <button type=\"submit\" onclick=\"location.href='EditarProducto.php ? pid=$row[0]&pnombre=$row[1]&pdescripcion=$row[2]&pprecio=$row[3]&pempresa=$row[5]&pcategoria=$row[6]'\" rel=\"tooltip\" title=\"Editar\" name = \"editar$row[0]\" value = \"$row[0]\" class=\"btn btn-info btn-simple btn-link\">\n";
        $output .= "<i class=\"fa fa-edit\"></i>\n";
        $output .= "</button>\n";
        $output .= "<button type=\"button\" onclick=\"location.href='../controlador/controladorBorrarProducto.php ? pid=$row[0]'\" rel=\"tooltip\" title=\"Eliminar\" name = \"eliminar$row[0]\" class=\"btn btn-danger btn-simple btn-link\">\n";
        $output .= "<i class=\"fa fa-times\"></i>\n";
        $output .= " </button>\n";
        $output .= "</td>\n";
        $output .= "</tr>\n";
      }  
      echo $output;  
 }  
 ?>  