       var check = document.getElementById('addAvatar');
     var avatar = document.getElementById('avatar');
     document.addEventListener("DOMContentLoaded", check.onclick =function(event) {
   if(this.checked) {
     avatar.document.getElementById('avatar').style.display = 'block';
     
   } else {
     avatar.document.getElementById('avatar').style.display = 'none';
      
   }
});
