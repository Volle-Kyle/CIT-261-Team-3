<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teacher's Aide</title>
        <link type="image/gif" rel="icon" href="favicon.ico" />
        <link type="text/css" rel="stylesheet" href="style.css" />
        <script>
            function getFullYear() {
                var d = new Date();
                var n = d.getFullYear();
                document.getElementById("year").innerHTML = n;
            }
            function getDaysLeftInMonth() {
                var d = new Date();
                var month = d.getMonth();
                var day = d.getDate();
                var totalDays;
                switch (month) {
                    case 2:
                        totalDays = 28;
                        break;
                    case 4:
                    case 6:
                    case 9:
                    case 11:
                        totalDays = 30;
                        break;
                    case 1:
                    case 3:
                    case 5:
                    case 7:
                    case 8:
                    case 10:
                    case 12:
                        totalDays = 31;
                        break;
                }
                var daysLeft = totalDays - day;
                document.getElementById("countdown").innerHTML = "Days left this month: " + daysLeft;
            }
        </script>
        <script>
            var exampleWholeObject =
                [{
                    "family0":
                    [{
                        "familyName":"Jones",
                        "fatherName":"John Jones",
                        "motherName":"Julie Jones",
                        "child0Name":"Jeremy Jones",
                        "child1Name":"January Jones"
                    }],
                    "family1":
                    [{
                        "familyName":"Smith",
                        "fatherName":"Sam Smith",
                        "motherName":null,
                        "child0Name":"Sarah Smith"
                    }]
                }];
            var exampleJonesFam =
                [{
                    "John Jones":
                    [{
                        "birthday":"March 15th",
                        "notes":"Works construction, busy most days but free most evenings."
                    }],
                    "Julie Jones":
                    [{
                        "birthday":"June 29th",
                        "notes":"Stays at home, works with young women, so Wednesdays are busy."
                    }],
                    "Jeremy Jones":
                    [{
                        "birthday":"August 9th",
                        "notes":"Graduating high school this year, favorite candy bar is Snickers."
                    }],
                    "January Jones":
                    [{
                        "birthday":"Unknown",
                        "notes":"Likes to dance."
                    }]
                }];
            var exampleAppointments =
                [{
                    "appointment0":
                    [{
                        "family":"Jones",
                        "date":"8th July, 2015",
                        "time":"7:00pm"
                    }],
                    "appointment1":
                    [{
                        "family":"Smith",
                        "date":"7/14/15",
                        "time":"6pm"
                    }]
                }];
            function landerFamilies() {
                var output = "";
                for (var i = 0; i < exampleWholeObject.length; i++) {
                    output += "<div class='button-fam'>" + exampleWholeObject["family" + i].familyName + " &rightarrow; </div>";
                }
                document.getElementById("lander-families").innerHTML = output;
            }
            </script>
        <!-- This is just a very rough sketch of some of the key features of our appointment scheduler -->
        <script type="text/javascript">
            function saveUserInfo(){

                function saveFamily(){
                    var theFamily = document.getElementById('myFamily');
                    localStorage.setItem('myFamily',myFamily.value);
                }
                function saveDate(){
                   var theDate = document.getElementById('myDate');
                   localStorage.setItem('myDate',myDate.value);
                }
                function saveTime(){
                    var theTime = document.getElementById('myTime');
                    localStorage.setItem('myTime',myTime.value);
                }
                saveFamily();
                saveDate();
                saveTime();
            }
            // This function merely displays the information that is currently stored by the browser.
            // Exploring the options in how to save separate appointments / make corrections to appointments / remove appointment stored, etc.
            function displayUserInfo(){
                document.getElementById("showAppointment").innerHTML = ("The name of the family is: " + localStorage.getItem('myFamily') + "<br>The date of the appointment is: "
                        + localStorage.getItem('myDate') + "<br>The time of the appointment is: " + localStorage.getItem('myTime') );
            }
        </script>
        <!-- Removing this for new script
        <script type="text/javascript" src="countdown.js"></script>-->
    </head>
    <body onload="getFullYear(); getDaysLeftInMonth(); landerFamilies();">
        <div id="lander">
            <h1>Teacher's Aide</h1>
            <h3>Families</h3>
            <div id="lander-families"><!-- JS function will construct families list --></div>
            <h3>Appointments</h3>
            <div id="lander-appointments" class="button-appt"><!-- JS function will construct appointment list --></div>
            <div id="countdown"><!-- This is where the script will display the countdown timer --></div>
        </div>
        <hr/>
        <div id="family-info">
        </div>
        <hr/>
        <div id="individual-info">
        </div>
        <hr/>
        <div id="appointment">
            <h3>Family</h3><input type='text' id='myFamily'><br>
            <h3>Date</h3><input type="date" id="myDate"><br>
            <h3>Time</h3><input type="time" id='myTime'><br><br>
            <input type='button' onclick ='saveUserInfo()' value='Save Appointment'/>
            <input type='button' onclick ='displayUserInfo()' value='Display Appointment'/>
            <p id ="showAppointment"></p>
            <h3>Countdown</h3>
            <div id="countdown"></div>
        </div>
        <footer>
            <hr/>
            &copy; Copyright Teacher's Aide <div id="year"></div>, All Right's Reserved.
        </footer>
    </body>
</html>
