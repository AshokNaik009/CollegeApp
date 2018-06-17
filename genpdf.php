<?php
    require("fpdf17/fpdf.php");

 include 'connection.php';
 if(isset($_GET['sm']))
 {
    // $get1=mysql_query("SELECT * FROM studreg where reg_no='{$_GET['id']}'");
$sem=$_GET['sm']; 



 

    //Create new pdf file
    $pdf=new FPDF();

    //Open file
    $pdf->Open();

    //Disable automatic page break
    $pdf->SetAutoPageBreak(false);

    //Add first page
    $pdf->AddPage();

    //set initial y axis position per page
    $y_axis_initial = 25;

	//print column titles for the actual page
	$pdf->SetTitle('Student List');
    $pdf->SetFillColor(232, 232, 232);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetY($y_axis_initial);
    $pdf->SetX(5);
    $pdf->Cell(10, 6, 'ID', 1, 0, 'L', 1);
    $pdf->Cell(40, 6, 'NAME', 1, 0, 'L', 1);
	$pdf->Cell(40, 6, 'SEMESTER', 1, 0, 'L', 1);

	$pdf->Cell(40, 6, 'REG NO', 1, 0, 'L', 1);
	$pdf->Cell(49, 6, 'EMAIL', 1, 0, 'L', 1);
    $row_height = 6;
    $y_axis = $y_axis_initial + $row_height;

    //Select the Products you want to show in your PDF file
    $sql = mysql_query("SELECT id,name,semester,reg_no,email FROM studreg where semester='{$_GET['sm']}'");
    

    //initialize counter
    $i = 0;

    //Set maximum rows per page
    $max = 25;

    //Set Row Height
    

    while($row =mysql_fetch_array($sql))
    {
        //If the current row is the last one, create new page and print column title
        if ($i == $max)
        {
            $pdf->AddPage();

            //print column titles for the current page
            $pdf->SetY($y_axis_initial);
            $pdf->SetX(4);
            $pdf->Cell(10, 6, 'ID', 1, 0, 'L', 1);
             $pdf->Cell(40, 6, 'NAME', 1, 0, 'L', 1);
	        $pdf->Cell(40, 6, 'SEMESTER', 1, 0, 'L', 1);
	      
	        $pdf->Cell(40, 6, 'REG NO', 1, 0, 'L', 1);
	        $pdf->Cell(49, 6, 'EMAIL', 1, 0, 'L', 1);

            //Go to next row
            $y_axis = $y_axis + $row_height;

            //Set $i variable to 0 (first row)
            $i = 0;
        }

        $id= $row[0];
        $name = $row[1];
		$sem = $row[2];
		$reg = $row[3];
        $email = $row[4];

        $pdf->SetY($y_axis);
        $pdf->SetX(5);
        $pdf->Cell(10, 6, $id, 1, 0, 'L', 1);
        $pdf->Cell(40, 6, $name, 1, 0, 'L', 1);
		$pdf->Cell(40, 6, $sem, 1, 0, 'L', 1);
		$pdf->Cell(40, 6, $reg, 1, 0, 'L', 1);
        $pdf->Cell(49, 6, $email, 1, 0, 'L', 1);
            
        //Go to next row
        $y_axis = $y_axis + $row_height;
        $i = $i + 1;
    }


    //Create file
    $pdf->Output();
    


    $delete=mysql_query("DELETE from studreg where semester='$sem'");
  
   if($delete)
   {
        echo "<script>  alert('Record Deleted');  </script>";
   }
   else
   {
       die(mysql_error());
   }
    
   }
   
    ?>