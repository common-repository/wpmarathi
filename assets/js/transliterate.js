function transliterator(selector){
    var selector = selector;
    var transliterator = {
        toggleTransliteration : ()=>{
            // Place holder
        }
    };
    this.load = function(enableTransliteration = true){
        var element = document.querySelector(selector);
        if(element === null){
            console.warn(`element ${selector} doesn't exist`);
            return;
        }
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.MARATHI],
            transliterationEnabled: enableTransliteration,
            //shortcutKey: 'ctrl+g'
        };
        
        // Create an instance on TransliterationControl with the required
        // options.
        transliterator =
            new google.elements.transliteration.TransliterationControl(options);
        // Enable transliteration in the editable DIV with id
        // 'transliterateDiv'.
        transliterator.makeTransliteratable([element]);
    }
    this.toggle = function(){
        transliterator.toggleTransliteration();
    }
    /*
        Returns current transliteration status
    */
   
    this.status = function (){
        return transliterator.isTransliterationEnabled();
    }
}

