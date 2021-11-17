function showHide(x){
    if(x==0){
        document.getElementById('signup').style.display='none';
        document.getElementById('login').style.display='block';
    }
    else{
        document.getElementById('signup').style.display='block';
        document.getElementById('login').style.display='none';
    }
}