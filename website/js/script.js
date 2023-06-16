/*codigo do menu da navbar */
var header = document.getElementById("header");
var navigationHeader = document.getElementById("navigation_header");
var content=document.getElementById("content");
var showSidebar = false;

function toggleSidebar(){
  showSidebar = !showSidebar;
  console.log(showSidebar)
  if(showSidebar){
    navigation_header.style.marginLeft = '-10vw';
    navigation_header.style.animationName = 'showSidebar';
    content.style.filter = 'blur(2px)'
  } else{
    navigation_header.style.marginLeft= '-100vw';
    navigation_header.style.animationName = '';
    content.style.filter = ''
  }
}
function closeSidebar(){
  if(showSidebar){
    toggleSidebar();
  }
}
window.addEventListener('resize', function(event){
  if(window.innerWidth > 768 && showSidebar){
    toggleSidebar();
  }
});

/*codigo do formulario (so funciona se mandar a partir do email ark1000ark@gmail.com)*/
function sendEmail(){
  Email.send({
    SecureToken : "369fa9b6-f323-41e1-bda9-f35b8bada453",
    To : 'ark1000ark@gmail.com',
    From : document.getElementById("email").value,
    Subject : "Formulario - Website Junta de Freguesia de Cabaços",
    Body : "Nome: " + document.getElementById("name").value
      + "<br> E-mail: " + document.getElementById("email").value
      + "<br> Numero de Telemovel: " + document.getElementById("phone").value
      + "<br> Mensagem: " + document.getElementById("mensagem").value
}).then(
  message => alert(message)
);
}