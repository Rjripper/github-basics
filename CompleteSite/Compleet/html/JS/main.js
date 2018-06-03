
   function toggleSidebar(id)
   {
   var divelement = document.getElementById(id);
   // console.log(x);
   if(divelement.style.display == 'none')
       {
           divelement.style.display = 'inline-block';
           document.getElementById("mainListItems").style.width = "60%";
       }
   else
       {
       divelement.style.display = 'none';
       document.getElementById("mainListItems").style.width = "100%";
       }

   }

   var x = window.matchMedia("(max-width: 768px)");
   toggleSidebar(x);// Call listener function at run time
   x.addListener(toggleSidebar); // Attach listener function on state changes



