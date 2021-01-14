<html>
   <head>
      <title>GPS Time Converter</title>
   </head>
   <body>

     <table width=100%>
     <tr>
     <td width=20%><a href="http://www.ligo.org">
     <img src="../detchar/LIGOLogo.gif" border="0"></a></td>
     <td><center><h2><font face="arial">GPS Time Converter</font></center>
     </h2></td>
     <td width=20%><right><a href="http://www.andrews.edu">
     <img align="right" src="../detchar/aubullet.gif" border="0"></right></td>
     </tr>
     </table>

    <hr width="100%">

     <form action="timedisplay.php" method="post">
	<p><input type="radio" checked="checked" name="timevsgps" value="time"> 
	Time: <select name="month">
		    <option value="Jan">Jan</option>
		    <option value="Feb">Feb</option>
		    <option value="Mar">Mar</option>
		    <option value="Apr">Apr</option>
		    <option value="May">May</option>
		    <option value="Jun">Jun</option>
		    <option value="Jul">Jul</option>
		    <option value="Aug">Aug</option>
		    <option value="Sep">Sep</option>
		    <option value="Oct">Oct</option>
		    <option value="Nov">Nov</option>
		    <option value="Dec">Dec</option>
		 </select>
		 <select name="day">
		    <option value="1">1</option>
		    <option value="2">2</option>
		    <option value="3">3</option>
		    <option value="4">4</option>
		    <option value="5">5</option>
		    <option value="6">6</option>
		    <option value="7">7</option>
		    <option value="8">8</option>
		    <option value="9">9</option>
		    <option value="10">10</option>
		    <option value="11">11</option>
		    <option value="12">12</option>
		    <option value="13">13</option>
		    <option value="14">14</option>
		    <option value="15">15</option>
		    <option value="16">16</option>
		    <option value="17">17</option>
		    <option value="18">18</option>
		    <option value="19">19</option>
		    <option value="20">20</option>
		    <option value="21">21</option>
		    <option value="22">22</option>
		    <option value="23">23</option>
		    <option value="24">24</option>
		    <option value="25">25</option>
		    <option value="26">26</option>
		    <option value="27">27</option>
		    <option value="28">28</option>
		    <option value="29">29</option>
		    <option value="30">30</option>
		    <option value="31">31</option>
	       </select>
		<input type="text" name="year" size=4 maxlength=4>    
		&nbsp&nbsp&nbsp 
		<input type="text" name="hour" size=2 maxlength=2>
		:<input type="text" name="min"  size=2 maxlength=2>
		:<input type="text" name="sec"  size=2 maxlength=2>
		    &nbsp&nbsp&nbsp
		<select name="type">
		    <option value="24Hour">24 Hour</option>
		    <option value="am">am</option>
		    <option value="pm">pm</option>
		</select>
		<select name="zone">
		    <option value="UTC">UTC</option>
		    <option value="Central">Central</option>
		    <option value="Pacific">Pacific</option>
		</select>
        </p>
	<p><input type="radio" name="timevsgps" value="gps">
	   GPS:<input type="text" size=10 maxlength=10 name="gps"></p>
        <p><input type="radio" name="timevsgps" value="now">
           Now</p>
	<p><input type="submit" value="Convert Time" /></p>
     </form> 	
 

   <hr width=100%>
   <p> If you have any questions or suggestions regarding this form, please send them to <b>tzs <i>at</i> andrews <i>dot</i> edu</b>.<br>
<a href="http://www.andrews.edu/~tzs/timeconv/timealgorithm.html">Time conversion algorithm</a>
   </body>
</html>
