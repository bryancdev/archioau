
<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Member Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<style>
  div.scroll 
  {
    width:100%;
    overflow: scroll;
  }
  td{
    padding-left: 5px;
  }
  @media print {
    #printPageButton {
      display: none;
    }
  }
</style>
<body style="font-family:cambria">
  <nav class="navbar-inverse" style = "background-color:#1f386e; ">
    <div class="container-fluid">
      <div class="navbar-brand" style="padding-top: 0px;">
            <img src="images/introbg3.jpg" style="width: 50px">
        </div>
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><font style="color: white">SHRINE OF OUR LADY LORETO SAVINGS AND CREDIT COOPERATIVE</font></a>    
      </div>
     <ul class="nav navbar-nav navbar-right ">
        <li  style="width: 100px; text-align:center"><a href="admin_page.php">Home <i class="glyphicon glyphicon-home"></i></a></li>
        <li class="dropdown active" style="width: 160px; text-align:center">
            <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >File Maintenance <i class="glyphicon glyphicon-cog"></i></a>
            <ul class="dropdown-menu" style="padding: 10px;">
                <li><a class="btn btn-default" href="list_of_members.php">Members Info</a></li>
                <li><a class="btn btn-default" href="admin_loan.php">Loan Type</a></li>
                <li><a class="btn btn-default" href="payment.php">Payment Type</a></li>
                <li><a class="btn btn-default" href="accounts.php">Accounts</a></li>
                <!--<li><a class="btn btn-default" href="#">Penalties</a></li>-->
            </ul>
        </li>
        <li class="nav-item dropdown" style="width: 160px; text-align:center">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >Transactions <span style="font-size:20px"> &#8369;</span></a>
            <ul class="dropdown-menu" style="padding: 10px">
                <li><a class="btn btn-default" href="shared.php">Share Capital </a></li>
                <li><a class="btn btn-default" href="admin_addloan.php">Loan</a>      </li>
                <li><a class="btn btn-default" href="savings.php">Savings</a></li>
                <li><a class="btn btn-default" href="check.php">Cheque</a></li>
                
            </ul>
        </li>
        <li class="nav-item dropdown" style="width: 130px; text-align:center">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" >Reports <i class="glyphicon glyphicon-file"></i></a>
            <ul class="dropdown-menu" style="padding: 10px">
                <li><a class="btn btn-default" href="reports.php">List of Members </a></li>
                <li><a class="btn btn-default" href="dailytransaction.php">Daily Transactions</a>      </li>
                
                
            </ul>
        </li>

        <li><a href="logout.php">Logout  <span class="glyphicon glyphicon-log-out"></a></li>
      </ul>
  </nav>
  <!-- ##############################################################################################-->
  <!-- ####################################### Application Form #######################################-->
  <form  method="post"  action="submit.php"><input type="text" name="txtdateToday" id="txtdateToday" style="border: 0px; text-align: right; background-color: transparent; visibility: hidden" value="<?php echo date("m/d/Y");?>" ><input type="text" name="user" value="<?php  echo $login_session; ?>" style="visibility: hidden"><br>
             
    <center><h1>APPLICATION FORM  <i class="glyphicon glyphicon-file"></i> </h1></center>
    <!--<input type="reset"  value="CLEAR" class='btn btn-danger'/>-->
    <!-- ##############################################################################################-->
    <!-- ####################################### Member Identification#######################################-->
    <div class="panel panel-default " style="margin:10px; " >
      <div class="panel-body" style="padding-top:0px; background-color: #f1f4f9">
        <h4 ><i class="glyphicon glyphicon-user"></i><b> Member Identification</b></h4>
        <div class="row" style="padding: 10px">
            <div class="col-md-3" >
             Member ID: <input type="text" name="txtmemid" class="form-control" required>

            </div>
            <div class="col-md-5">
              Types of Member:<br>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="txttypesofmem" value="Regular" checked> Regular &nbsp&nbsp&nbsp&nbsp
          
              <input type="radio" name="txttypesofmem" value="Associate" > Associate
             
            </div>
        </div>
      </div>
    </div>
    <!-- ####################################### Closing of Member Identification #######################################-->
    <!-- ####################################### Personal Data #######################################-->
    <div class="panel panel-default " style="margin:10px; " >
      <div class="panel-body" style="padding-top:0px; background-color: #f1f4f9">
        <h4 ><i class="glyphicon glyphicon-user"></i><b> Personal Data</b></h4>
        <div id="pd">
          <div class="row" style="padding: 10px">
            <div class="col-md-3" >
             Last Name: <input type="text" name="txtlast" class="form-control text-uppercase" required>
            </div>
            <div class="col-md-3" >
              First Name: <input type="text" name="txtfirst" class="form-control text-uppercase" required>
            </div>
            <div class="col-md-3" >
              Middle Name: <input type="text" name="txtmiddle" class="form-control text-uppercase" required>
            </div>
            <div class="col-md-1" >
              Age: <input type="text" name="txtage" class="form-control text-uppercase">
            </div>
            <div class="col-md-2" >
              Sex: 
              <select name="cbsex" class="form-control" >
                <option hidden value="">-Select-</option>
                <option>MALE</option>
                <option>FEMALE</option>
              </select>
            </div>
          </div>
          <div class="row" style="padding: 10px">    
            <div class="col-md-9" >
              Present Address: <input type="text" name="txtPresAddress"   class="form-control text-uppercase">
            </div>
            <div class="col-md-3" >
              Contact Number: <input type="text" name="txtPresContactNo" class="form-control text-uppercase">
            </div>
          </div>
          <div class="row" style="padding: 10px">    
          
            <div class="col-md-9" >
              Permanent Address: <input type="text" name="txtPerAddress" class="form-control text-uppercase">
            </div>
            <div class="col-md-3" >
              Contact Number: <input type="text" name="txtPerContactNo" class="form-control text-uppercase">
            </div>
                                    
          </div>
          <div class="row" style="padding: 10px">
            <div class="col-md-6" >
              Church Organization/s: <input type="text" name="txtChurchOrg"  class="form-control text-uppercase">
            </div>
            <div class="col-md-3">
              Date of Birth: 
              <input type="date" class="form-control text-uppercase" name="txtdateOfBirth">

            </div>
            <div class="col-md-3" >
              Place of Birth: <input type="text" name="txtPlaceOfBirth" class="form-control">
            </div>       
          </div>
          <div class="row" style="padding: 10px">
            <div class="col-md-3" >
              Religion: 
              <select name="txtReligion" class="form-control">
                <option hidden value="">-Select-</option>
                <option>Catholic</option>
              </select>
            </div>
            <div class="col-md-3" >
              Civil Status: 
              <select name="txtCivilStat" class="form-control">
                <option hidden value="">-Select-</option>
                <option>Single</option>
                <option>Married</option>
                <option>Widowed</option>
              </select>
            </div>
            <div class="col-md-3" >
              Citizenship: 
              <select name="txtCitizenship" class="form-control">
                <option hidden value="">-Select-</option>
                <option>Filipino</option>
                <option>Others</option>
              </select>
            </div>
            <div class="col-md-3" >
              Email: <input type="text" name="txtEmail" class="form-control">
            </div>
          </div>
          <div class="row" style="padding: 10px">
            <div class="col-md-3" >
              Occupation: <input type="text" name="txtOccupation"  class="form-control">
            </div>
            <div class="col-md-6" >
              Employer: <input type="text" name="txtEmp"   class="form-control">
            </div>
            <div class="col-md-3" >
              Salary: <input type="text" name="txtSalary" class="form-control">
            </div>
          </div>
          <div class="row" style="padding: 10px">
            <div class="col-md-3" >
            Other Sources of Income: <input type="text" name="txtOtherSourceIncome" class="form-control"></font>
            </div> 
            <div class="col-md-3" >
              Income: <input type="text" name="txtIncome" class="form-control">
            </div>
            <div class="col-md-3" >
              GSIS/SSS Number: <input type="text" name="txtGsis" class="form-control">
            </div>
            <div class="col-md-3" >
              TIN Number: <input type="text" name="txtTin" class="form-control" >
            </div>
            <div class="col-md-3" >
            </div>
            <div class="col-md-3" >
            </div>
          </div>
        </div> 
      </div>
    </div>
    <!-- ##############################################################################################-->
    <!-- ####################################### Family Member #######################################-->
   
    <div class="panel panel-default" style="margin:10px; " >
      <div class="panel-body " style="padding-top:0px; background-color: #f1f4f9">
        <h4 ><i class="glyphicon glyphicon-user"></i><b> Family Members</b></h4>
        <div id="fm">
          <div class="row" style="padding: 10px">
            <div class="col-md-1" ><br>
              Father:
            </div>
            <div class="col-md-4" >
              Name:<input type="text" name="txtFatherName" class="form-control">
            </div>
            <div class="col-md-2" >
               Age:<input type="text" name="txtFatherAge" class="form-control"></font>
            </div>
            <div class="col-md-5" >
              Occupation: <input type="text" name="txtFatherOcc"   class="form-control">
            </div>
          </div>
          <div class="row" style="padding: 10px">
            <div class="col-md-1" >
              Mother:
            </div>
            <div class="col-md-4" >
               <input type="text" name="txtMotherName" class="form-control">
            </div>
            <div class="col-md-2" >
              <input type="text" name="txtMotherAge" class="form-control"></font>
            </div>
            <div class="col-md-5" >
              <input type="text" name="txtMotherOcc"   class="form-control">
            </div>
          </div>
          <div class="row" style="padding: 10px">
            <div class="col-md-1" >
              Spouse:
            </div>
            <div class="col-md-4" >
              <input type="text" name="txtSpouseName" class="form-control">
            </div>
            <div class="col-md-2" >
              <input type="text" name="txtSpouseAge" class="form-control"></font>
            </div>
            <div class="col-md-5" >
              <input type="text" name="txtSpouseOcc"   class="form-control">
            </div>
          </div>

          <div class="row" style="padding: 10px">
            <div class="col-md-1" >
              Child 1:
            </div>
            <div class="col-md-4" >
                <input type="text" name="txtChild1Name" class="form-control">
            </div>
            <div class="col-md-2" >
               <input type="text" name="txtChild1Age" class="form-control"></font>
            </div>
            
            <div class="col-md-5" >
               <input type="text" name="txtChild1Occ"   class="form-control">
            </div>
          </div>

          <div class="row" style="padding: 10px">
            <div class="col-md-1" >
              Child 2:
            </div>
            <div class="col-md-4" >
               <input type="text" name="txtChild2Name" class="form-control">
            </div>
            <div class="col-md-2" >
               <input type="text" name="txtChild2Age" class="form-control"></font>
            </div>
            
            <div class="col-md-5" >
               <input type="text" name="txtChild2Occ"   class="form-control">
            </div>
          </div>
          <div class="row" style="padding: 10px">
            <div class="col-md-1" >
              Child 3:
            </div>
            <div class="col-md-4" >
              <input type="text" name="txtChild3Name" class="form-control">
            </div>
            <div class="col-md-2" >
              <input type="text" name="txtChild3Age" class="form-control"></font>
            </div>
            
            <div class="col-md-5" >
               <input type="text" name="txtChild3Occ"   class="form-control">
            </div>
          </div>
          <div class="row" style="padding: 10px">
            <div class="col-md-1" >
              Child 4:
            </div>
            <div class="col-md-4" >
                <input type="text" name="txtChild4Name" class="form-control">
            </div>
            <div class="col-md-2" >
              <input type="text" name="txtChild4Age" class="form-control"></font>
            </div>
            <div class="col-md-5" >
              <input type="text" name="txtChild4Occ"   class="form-control">
            </div>
          </div>
          <div class="row" style="padding: 10px">
            
            <div class="col-md-1" >
              Child 5:
            </div><div class="col-md-4" >
                <input type="text" name="txtChild5Name" class="form-control">
            </div>
            <div class="col-md-2" >
              <input type="text" name="txtChild5Age" class="form-control"></font>
            </div>
            
            <div class="col-md-5" >
               <input type="text" name="txtChild5Occ"   class="form-control">
            </div>
          </div> 
          <div class="row" style="padding: 10px">
            <div class="col-md-4" >
              Person/s to be Notified in Case of Emergency:  <input type="text" name="txtPIncaseEmer" class="form-control">
            </div>
            <div class="col-md-4" >
               Address: <input type="text" name="txtPIncaseEmerAdd" class="form-control">
            </div>
            
            <div class="col-md-4" >
              Contact No. <input type="text" name="txtPIncaseEmerConNo" class="form-control">
            </div>
          </div>          
                  
        </div>
      </div>
    </div>

    <!-- ##############################################################################################-->
    <!-- ####################################### Education #######################################-->
   
    <div class="panel panel-default" style="margin:10px; " >
      
      <div class="panel-body " style="padding-top:0px; background-color: #f1f4f9">
        <h4 ><i class="glyphicon glyphicon-education"></i><b> Education</b></h4>
          <div id="Ed">
            
            <div class="row" style="padding: 10px">
                <div class="col-md-2" ><br>
                  Elementary Level:  
                </div>
                <div class="col-md-8" >
                   Name and Location of School:<input type="text" name="txtElementaryName" class="form-control"></font>
                </div>
                <div class="col-md-2" >
                  Year Graduated: 
                    <select name="txtElementaryYear" class="form-control">
                            <option hidden value="">-Select-</option>
                            <option>1950</option>
                            <option>1951</option>
                            <option>1952</option>
                            <option>1953</option>
                            <option>1954</option>
                            <option>1955</option>
                            <option>1956</option>
                            <option>1957</option>
                            <option>1958</option>
                            <option>1959</option>
                            <option>1960</option>
                            <option>1961</option>
                            <option>1962</option>
                            <option>1963</option>
                            <option>1964</option>
                            <option>1965</option>
                            <option>1966</option>
                            <option>1967</option>
                            <option>1968</option>
                            <option>1969</option>
                            <option>1970</option>
                            <option>1971</option>
                            <option>1972</option>
                            <option>1973</option>
                            <option>1974</option>
                            <option>1975</option>
                            <option>1976</option>
                            <option>1977</option>
                            <option>1978</option>
                            <option>1979</option>
                            <option>1980</option>
                            <option>1981</option>
                            <option>1982</option>
                            <option>1983</option>
                            <option>1984</option>
                            <option>1985</option>
                            <option>1986</option>
                            <option>1987</option>
                            <option>1988</option>
                            <option>1989</option>
                            <option>1990</option>
                            <option>1991</option>
                            <option>1992</option>
                            <option>1993</option>
                            <option>1994</option>
                            <option>1995</option>
                            <option>1996</option>
                            <option>1997</option>
                            <option>1998</option>
                            <option>1999</option>
                            <option>2000</option>
                            <option>2001</option>
                            <option>2002</option>
                            <option>2003</option>
                            <option>2004</option>
                            <option>2005</option>
                            <option>2006</option>
                            <option>2007</option>
                            <option>2008</option>
                            <option>2009</option>
                            <option>2010</option>
                            <option>2011</option>
                            <option>2012</option>
                            <option>2013</option>
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            </select>
                </div>
            </div>

            <div class="row" style="padding: 10px">
                <div class="col-md-2" >
                  High School Level:  
                     
                </div>
                <div class="col-md-8" >
                   <input type="text" name="txtHighSchoolName" class="form-control"></font>
                </div>
                <div class="col-md-2" >
                  
                    <select name="txtHighSchoolYear" class="form-control">
                            <option hidden value="">-Select-</option>
                            <option>1950</option>
                            <option>1951</option>
                            <option>1952</option>
                            <option>1953</option>
                            <option>1954</option>
                            <option>1955</option>
                            <option>1956</option>
                            <option>1957</option>
                            <option>1958</option>
                            <option>1959</option>
                            <option>1960</option>
                            <option>1961</option>
                            <option>1962</option>
                            <option>1963</option>
                            <option>1964</option>
                            <option>1965</option>
                            <option>1966</option>
                            <option>1967</option>
                            <option>1968</option>
                            <option>1969</option>
                            <option>1970</option>
                            <option>1971</option>
                            <option>1972</option>
                            <option>1973</option>
                            <option>1974</option>
                            <option>1975</option>
                            <option>1976</option>
                            <option>1977</option>
                            <option>1978</option>
                            <option>1979</option>
                            <option>1980</option>
                            <option>1981</option>
                            <option>1982</option>
                            <option>1983</option>
                            <option>1984</option>
                            <option>1985</option>
                            <option>1986</option>
                            <option>1987</option>
                            <option>1988</option>
                            <option>1989</option>
                            <option>1990</option>
                            <option>1991</option>
                            <option>1992</option>
                            <option>1993</option>
                            <option>1994</option>
                            <option>1995</option>
                            <option>1996</option>
                            <option>1997</option>
                            <option>1998</option>
                            <option>1999</option>
                            <option>2000</option>
                            <option>2001</option>
                            <option>2002</option>
                            <option>2003</option>
                            <option>2004</option>
                            <option>2005</option>
                            <option>2006</option>
                            <option>2007</option>
                            <option>2008</option>
                            <option>2009</option>
                            <option>2010</option>
                            <option>2011</option>
                            <option>2012</option>
                            <option>2013</option>
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            </select>
                </div>
            </div>

            <div class="row" style="padding: 10px">
                <div class="col-md-2" >
                  College Level:  
                      
                </div>
                <div class="col-md-8" >
                   <input type="text" name="txtCollegeName" class="form-control"></font>
                </div>
                <div class="col-md-2" >
                  
                    <select name="txtCollegeYear" class="form-control">
                            <option hidden value="">-Select-</option>
                            <option>1950</option>
                            <option>1951</option>
                            <option>1952</option>
                            <option>1953</option>
                            <option>1954</option>
                            <option>1955</option>
                            <option>1956</option>
                            <option>1957</option>
                            <option>1958</option>
                            <option>1959</option>
                            <option>1960</option>
                            <option>1961</option>
                            <option>1962</option>
                            <option>1963</option>
                            <option>1964</option>
                            <option>1965</option>
                            <option>1966</option>
                            <option>1967</option>
                            <option>1968</option>
                            <option>1969</option>
                            <option>1970</option>
                            <option>1971</option>
                            <option>1972</option>
                            <option>1973</option>
                            <option>1974</option>
                            <option>1975</option>
                            <option>1976</option>
                            <option>1977</option>
                            <option>1978</option>
                            <option>1979</option>
                            <option>1980</option>
                            <option>1981</option>
                            <option>1982</option>
                            <option>1983</option>
                            <option>1984</option>
                            <option>1985</option>
                            <option>1986</option>
                            <option>1987</option>
                            <option>1988</option>
                            <option>1989</option>
                            <option>1990</option>
                            <option>1991</option>
                            <option>1992</option>
                            <option>1993</option>
                            <option>1994</option>
                            <option>1995</option>
                            <option>1996</option>
                            <option>1997</option>
                            <option>1998</option>
                            <option>1999</option>
                            <option>2000</option>
                            <option>2001</option>
                            <option>2002</option>
                            <option>2003</option>
                            <option>2004</option>
                            <option>2005</option>
                            <option>2006</option>
                            <option>2007</option>
                            <option>2008</option>
                            <option>2009</option>
                            <option>2010</option>
                            <option>2011</option>
                            <option>2012</option>
                            <option>2013</option>
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            </select>
                </div>
            </div>

            <div class="row" style="padding: 10px">
                <div class="col-md-2" >
                  Post Graduate Level:  
                      
                </div>
                <div class="col-md-8" ><input type="text" name="txtPostName" class="form-control"></font>
                </div>
                <div class="col-md-2" > 
                    <select name="txtPostYear" class="form-control">
                            <option hidden value="">-Select-</option>
                            <option>1950</option>
                            <option>1951</option>
                            <option>1952</option>
                            <option>1953</option>
                            <option>1954</option>
                            <option>1955</option>
                            <option>1956</option>
                            <option>1957</option>
                            <option>1958</option>
                            <option>1959</option>
                            <option>1960</option>
                            <option>1961</option>
                            <option>1962</option>
                            <option>1963</option>
                            <option>1964</option>
                            <option>1965</option>
                            <option>1966</option>
                            <option>1967</option>
                            <option>1968</option>
                            <option>1969</option>
                            <option>1970</option>
                            <option>1971</option>
                            <option>1972</option>
                            <option>1973</option>
                            <option>1974</option>
                            <option>1975</option>
                            <option>1976</option>
                            <option>1977</option>
                            <option>1978</option>
                            <option>1979</option>
                            <option>1980</option>
                            <option>1981</option>
                            <option>1982</option>
                            <option>1983</option>
                            <option>1984</option>
                            <option>1985</option>
                            <option>1986</option>
                            <option>1987</option>
                            <option>1988</option>
                            <option>1989</option>
                            <option>1990</option>
                            <option>1991</option>
                            <option>1992</option>
                            <option>1993</option>
                            <option>1994</option>
                            <option>1995</option>
                            <option>1996</option>
                            <option>1997</option>
                            <option>1998</option>
                            <option>1999</option>
                            <option>2000</option>
                            <option>2001</option>
                            <option>2002</option>
                            <option>2003</option>
                            <option>2004</option>
                            <option>2005</option>
                            <option>2006</option>
                            <option>2007</option>
                            <option>2008</option>
                            <option>2009</option>
                            <option>2010</option>
                            <option>2011</option>
                            <option>2012</option>
                            <option>2013</option>
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            </select>
                </div>
            </div>

             <div class="row" style="padding: 10px">
                <div class="col-md-2" >
                  Course/s Finished:
                </div> 
                <div class="col-md-10" >
                   
                      <select name="cbPostGradLevel" class="form-control">
                        <option hidden value="">-Select-</option>
                        <option>Information Technology</option>
                        <option>Computer Science</option>
                        <option>Business Administration</option>
                        <option>Accountancy</option>
                        <option>HRM</option>
                        <option>Midwifery</option>
                        <option>Nursing</option>
                        <option>Doctor</option>
                        <option>Criminplogy</option>
                        <option>Engineering</option>
                        <option>Architecture</option>
                      </select>
                </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ##############################################################################################-->
    <!-- ####################################### Work Or Business History #######################################-->
  
      <div class="panel panel-default" style="margin:10px; " >
        <div class="panel-body " style="padding-top:0px; background-color: #f1f4f9">
          <h4 ><i class="glyphicon glyphicon-briefcase"></i><b> Work Or Business History</b></h4>
            <div id="wb">
              

          <div class="row" style="padding: 10px">
              <div class="col-md-3" >
              Job Description:<input type="text" name="txtJobDesc1" class="form-control" placeholder="1st Job">
              </div>
              <div class="col-md-5" >
              Name and Company Address: <input type="text" name="txtNameAndAdd1" class="form-control" >
              </div>
              <div class="col-md-2" >
               From-To: <input type="text" name="txtFromTo1" class="form-control" >
              </div>
              <div class="col-md-2" >
               Earnings:
               <select name="txtEarn1" class="form-control">
                        <option hidden value="">-Select-</option>
                        <option>1,000 - 5,000</option>
                        <option>5,001 - 10,000</option>
                        <option>10,001 - 20,000</option>
                        <option>20,001 - 30,000</option>
                        <option>30,001 - 40,000</option>
                        <option>40,001 - 50,000</option>
                        <option>50,001 - Above</option>
                </select>
              </div>
          </div>

          <div class="row" style="padding: 10px">
               <div class="col-md-3" >
               <input type="text" name="txtJobDesc2" class="form-control" placeholder="2nd Job">
                </div>
                <div class="col-md-5" >
               <input type="text" name="txtNameAndAdd2" class="form-control" >
                </div>
                <div class="col-md-2" >
               <input type="text" name="txtFromTo2" class="form-control" >
                </div>
                <div class="col-md-2" >
               <select name="txtEarn2" class="form-control">
                        <option hidden value="">-Select-</option>
                        <option>1,000 - 5,000</option>
                        <option>5,001 - 10,000</option>
                        <option>10,001 - 20,000</option>
                        <option>20,001 - 30,000</option>
                        <option>30,001 - 40,000</option>
                        <option>40,001 - 50,000</option>
                        <option>50,001 - Above</option>
                </select>
                </div>
            </div>

          <div class="row" style="padding: 10px">
                 <div class="col-md-3" >
               <input type="text" name="txtJobDesc3" class="form-control" placeholder="3rd Job">
                </div>
                 <div class="col-md-5" >
               <input type="text" name="txtNameAndAdd3" class="form-control" >
                </div>
                <div class="col-md-2" >
                <input type="text" name="txtFromTo3" class="form-control" >
                </div>
                <div class="col-md-2" >
                 <select name="txtEarn3" class="form-control">
                         <option hidden value="">-Select-</option>
                        <option>1,000 - 5,000</option>
                        <option>5,001 - 10,000</option>
                        <option>10,001 - 20,000</option>
                        <option>20,001 - 30,000</option>
                        <option>30,001 - 40,000</option>
                        <option>40,001 - 50,000</option>
                        <option>50,001 - Above</option>
                </select>
                </div>
          </div>

          <div class="row" style="padding: 10px">
                 <div class="col-md-3" >
                 <input type="text" name="txtJobDesc4" class="form-control" placeholder="4th Job">
                  </div>
                 <div class="col-md-5" >
                 <input type="text" name="txtNameAndAdd4" class="form-control" >
                  </div>
                  <div class="col-md-2" >
                 <input type="text" name="txtFromTo4" class="form-control" >
                  </div>
                  <div class="col-md-2" >
                 <select name="txtEarn4" class="form-control">
                         <option hidden value="">-Select-</option>
                        <option>1,000 - 5,000</option>
                        <option>5,001 - 10,000</option>
                        <option>10,001 - 20,000</option>
                        <option>20,001 - 30,000</option>
                        <option>30,001 - 40,000</option>
                        <option>40,001 - 50,000</option>
                        <option>50,001 - Above</option>
                </select>
                  </div>
          </div>

          <div class="row" style="padding: 10px">
                 <div class="col-md-3" >
                 <input type="text" name="txtJobDesc5" class="form-control" placeholder="5th Job">
                </div>
                 <div class="col-md-5" >
                <input type="text" name="txtNameAndAdd5" class="form-control" >
                </div>
                <div class="col-md-2" >
                 <input type="text" name="txtFromTo5" class="form-control" >
                </div>
                <div class="col-md-2" >
                 <select name="txtEarn5" class="form-control">
                         <option hidden value="">-Select-</option>
                        <option>1,000 - 5,000</option>
                        <option>5,001 - 10,000</option>
                        <option>10,001 - 20,000</option>
                        <option>20,001 - 30,000</option>
                        <option>30,001 - 40,000</option>
                        <option>40,001 - 50,000</option>
                        <option>50,001 - Above</option>
                </select>
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ##############################################################################################-->
    <!-- ####################################### Character Reference #######################################-->
  
      <div class="panel panel-default" style="margin:10px; " >
        <div class="panel-body " style="padding-top:0px; background-color: #f1f4f9">
          <h4 ><i class="glyphicon glyphicon-user"></i><b> Character Reference</b></h4>
            <div id="cr">
              <div class="row" style="padding: 10px">
                  <div class="col-md-3" >
                    Name:
                  </div>
                  <div class="col-md-4" >
                    Address: 
                  </div>
                  <div class="col-md-3" >
                    Occupation: 
                  </div>
                  <div class="col-md-2" >
                    Contact Number: 
                  </div>
              </div>

               <div class="row" style="padding: 10px" >
                  <div class="col-md-3" >
                  <input type="text" name="txtNameCharRef1" class="form-control" placeholder="Character Reference 1" required>
                  </div>
                  <div class="col-md-4" >
                  <input type="text" name="txtAddCharRef1" class="form-control" required>
                  </div>
                  <div class="col-md-3" >
                  <input type="text" name="txtOccCharRef1" class="form-control" required>
                  </div>
                  <div class="col-md-2" >
                  <input type="text" name="txtConNumCharRef1" class="form-control" required>
                  </div>
              </div>

               <div class="row" style="padding: 10px" placeholder="5th Job">
                  <div class="col-md-3" >
                  <input type="text" name="txtNameCharRef2" class="form-control" placeholder="Character Reference 2" required>
                  </div>
                  <div class="col-md-4" >
                  <input type="text" name="txtAddCharRef2" class="form-control" required>
                  </div>
                  <div class="col-md-3" >
                  <input type="text" name="txtOccCharRef2" class="form-control" required>
                  </div>
                  <div class="col-md-2" >
                  <input type="text" name="txtConNumCharRef2" class="form-control" required>
                  </div>
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <center><input type="submit" class="btn btn-success" Value="SAVE" name="submit"> </center><br><br>
      </div>
  </form>
</body>
</html>
