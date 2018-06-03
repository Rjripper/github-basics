
   function toggleSidebar(id)
   {
   var divelement = document.getElementById(id);

   if(divelement.style.display == 'none')
       {
       divelement.style.display = 'inline-block';
       }
   else
       {
       divelement.style.display = 'none';
       }

   }