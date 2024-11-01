var contentTransliterator       = new transliterator('#content_ifr');
var contentTextTransliterator   = new transliterator('#content')
var titleTransliterator         = new transliterator('#title');

var transliterationStatus       = true;

contentTextTransliterator.load(transliterationStatus);
titleTransliterator.load(transliterationStatus);



function toggleTransliterator(e){
    e.preventDefault();

    contentTransliterator.toggle();
    titleTransliterator.toggle();
    contentTextTransliterator.toggle();

    this.classList.toggle('enabled');
    this.classList.toggle('active');

    if(transliterationStatus){
        transliterationStatus = false;
    }else{
        transliterationStatus = true;
    }
    
    var text = this.querySelector('.text');
    
    if(transliterationStatus){
        text.innerText = 'Disable WPMarathi';
    }else{
        text.innerText = 'Enable WPMarathi';
    }
}

jQuery( document ).on('tinymce-editor-init',function(){
    contentTransliterator.load(transliterationStatus);
});

var transliterateToggle = document.querySelector('#toggle-transliterator');
if(transliterateToggle != null){
    transliterateToggle.addEventListener('click',toggleTransliterator);
}
