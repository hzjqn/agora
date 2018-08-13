$navbar = document.getElementById("navbarList");
$menuBtn = document.getElementById("menuBtn");

$menuBtn.addEventListener('click', function(){
    $navIsOpen = $navbar.classList.contains('open') ? true : false;
    if($navIsOpen){
        $navbar.classList.remove('open');
        console.log($navIsOpen);
    } else {
        $navbar.classList.add('open');
        console.log($navIsOpen);
    }
});