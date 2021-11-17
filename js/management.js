function choice(x){
    if(x==0){
        document.getElementById('sta').style.display='none';
        document.getElementById('delete').style.display='none';
        document.getElementById('update').style.display='none';
        document.getElementById('add').style.display='block';
        document.getElementById('add-pub').style.display='none';
        document.getElementById('add-cate').style.display='none';
        document.getElementById('add-shop').style.display='none';
    }
    else if(x==1){
        document.getElementById('sta').style.display='none';
        document.getElementById('delete').style.display='none';
        document.getElementById('update').style.display='block';
        document.getElementById('add').style.display='none';
        document.getElementById('add-pub').style.display='none';
        document.getElementById('add-cate').style.display='none';
        document.getElementById('add-shop').style.display='none';
    }
    else if(x==2){
        document.getElementById('sta').style.display='none';
        document.getElementById('delete').style.display='block';
        document.getElementById('update').style.display='none';
        document.getElementById('add').style.display='none';
        document.getElementById('add-pub').style.display='none';
        document.getElementById('add-cate').style.display='none';
        document.getElementById('add-shop').style.display='none';
    }
    else if(x==3){
        document.getElementById('sta').style.display='none';
        document.getElementById('delete').style.display='none';
        document.getElementById('update').style.display='none';
        document.getElementById('add').style.display='none';
        document.getElementById('add-pub').style.display='block';
        document.getElementById('add-cate').style.display='none';
        document.getElementById('add-shop').style.display='none';
    }else if(x==4){
        document.getElementById('sta').style.display='none';
        document.getElementById('delete').style.display='none';
        document.getElementById('update').style.display='none';
        document.getElementById('add').style.display='none';
        document.getElementById('add-pub').style.display='none';
        document.getElementById('add-cate').style.display='block';
        document.getElementById('add-shop').style.display='none';
    }
    else if(x==5){
        document.getElementById('sta').style.display='none';
        document.getElementById('delete').style.display='none';
        document.getElementById('update').style.display='none';
        document.getElementById('add').style.display='none';
        document.getElementById('add-pub').style.display='none';
        document.getElementById('add-cate').style.display='none';
        document.getElementById('add-shop').style.display='block';
    }
    else{
        document.getElementById('sta').style.display='block';
        document.getElementById('delete').style.display='none';
        document.getElementById('update').style.display='none';
        document.getElementById('add').style.display='none';
        document.getElementById('add-pub').style.display='none';
        document.getElementById('add-cate').style.display='none';
        document.getElementById('add-shop').style.display='none';
    }
}