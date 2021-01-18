$(document).ready(function () {
    n =  new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    if( (d+5) > 31 ){
        m++;
    }
    d += 5;
    const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    document.getElementById("date").innerHTML = "Time for delivery " + d + " " + monthNames[m];
});
