<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>hallallotmentsysytem</title>
</head>
<body background="IMG_20231105_112700.jpg">
<div class id="container">
 <form action="insert0.php" method="post">
 <h1><font color='#FFFFFF'>Hall Allotment Form</font></h1>

 <p><font color="#FFFFFF">"Required fields followed by *</p>
 <h2 > Student Contact Information </h2>
  <p>Name:*
 <input placeholder="John Smith" type="text" name="name" />
 </p>
 <p>
     Club Name*:
     <input placeholder="eg dance cclub" type="text" name="clubname" />
  </p>
  <p>Contact No *:<input placeholder="+91-945503XXXX " type="number" name="contactno"/></p>
  <p>Roll.no *:<input placeholder="eg me22b2017" type="text" name="rollno" /></p>
  <p>Email-id * :<input  placeholder="XYZ@abc.com" type="email" name="email"/></p>
  <hr/>
  <h2> Event details </h2>

  <p> Event Type *:
   <select name="event"  id="event">
   <option value="">**********select a event type**********</option>
   <option value="cultural">cultural</option>
   <option value="technical">technical</option>
   </select>
   </p>
   <p> AC REQURIEMENT
   <select name="ac"  id="ac">
   <option value="">**********select Reqirement**********</option>
   <option value="Yes">Yes</option>
   <option value="No">No</option>
   </select>
   </p>
              
 


   <p>Capacity Required *<input placeholder="eg 100" type="number" name="capacity"/></p>
   <p>Event Date:*<input type="date" name="date" /></p>
   <p>Event Start Time :*<input type="time" name="timestart" /></p>
   <p>Event End Time :*<input type="time" name="timeclose" /></p>
   <input type="submit" value="Book Now" />
   </div>
  </form>
   <form action="retrieve1.php" method="get">
</hr>
  </form>
 
 
      
</body>
</html>

