// NAV
var glowna = "";
var aktualnosci = "";
var onas = "";
var info = "";

function createNav(where)
{
    if (where == 1)
    {
        glowna = ' class="nav-selected"';
    }
    else if (where == 2)
    {
        aktualnosci = ' class="nav-selected"';
    }
    else if (where == 3)
    {
        onas = ' class="nav-selected"';
    }
    else
    {
       info = ' class="nav-selected"';
    }

    document.querySelector('nav').innerHTML = '<div class="normal"><a href="index.php" title="Never gonna give you up"'+glowna+'>Strona główna</a><a href="aktualnosci.php" title="Never gonna let you down"'+aktualnosci+'>Aktualności</a><a href="onas.html" title="Never gonna run around and desert you"'+onas+'>O nas</a><a href="informacje.html" title="Never gonna make you cry"'+info+'>Informacje</a></div><div class="mobile-version"><a href="index.php" title="Never gonna give you up"'+glowna+'><img src="img/home.png" alt=""></a><a href="aktualnosci.php" title="Never gonna let you down"'+aktualnosci+'><img src="img/Now.png" alt=""></a><a href="onas.html" title="Never gonna run around and desert you"'+onas+'><img src="img/profil.png" alt=""></a><a href="informacje.html" title="Never gonna make you cry"'+info+'><img src="img/info.png" alt=""></a></div>';
}

// CKEditor
var allTitle = document.querySelectorAll('.CKEtitle');
var allSubTitle = document.querySelectorAll('.CKEsubtitle');
var allText = document.querySelectorAll('.CKEtext');


for (var i = 0; i < allTitle.length; ++i) 
{
    ClassicEditor.create(allTitle[i],
    {
        toolbar: [ 
        'bold',
        'italic',
        'removeFormat',
        '|',
        'undo',
        'redo' 
        ]
    });
}

for (var i = 0; i < allSubTitle.length; ++i) 
{
    ClassicEditor.create(allSubTitle[i],
    {
        toolbar: [ 
        'bold',
        'italic',
        'removeFormat',
        'fontColor',
        'fontBackgroundColor',
        '|',
        'undo',
        'redo' 
        ]
    });
}

for (var i = 0; i < allText.length; ++i) 
{
    ClassicEditor.create(allText[i]);
}


// Material
const textFieldElements = [].slice.call(document.querySelectorAll('.mdc-text-field'));
textFieldElements.forEach((textFieldEl) => {
    mdc.textField.MDCTextField.attachTo(textFieldEl);
});