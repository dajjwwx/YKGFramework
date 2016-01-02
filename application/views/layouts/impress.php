<!doctype html>

<!--

    Welcome to the light side of the source, young padawan.

    One step closer to learn something interesting you are...

                               ____                  
                            _.' :  `._               
                        .-.'`.  ;   .'`.-.           
               __      / : ___\ ;  /___ ; \      __  
             ,'_ ""=-.:__;".-.";: :".-.":__;.-="" _`,
             :' `.t""=-.. '<@.`;_  ',@:` ..-=""j.' `;
                  `:-.._J '-.-'L__ `-.-' L_..-;'     
                    "-.__ ;  .-"  "-.  : __.-"       
                        L ' /.======.\ ' J           
                         "-.   "__"   .-"            
                        __.l"-:_JL_;-";.__           
                     .-j/'.;  ;""""  / .'\"-.        
                   .' /:`. "-.:     .-" .';  `.      
                .-"  / ;  "-. "-..-" .-"  :    "-.   
             .+"-.  : :      "-.__.-"      ;-._   \  
             ; \  `.; ;                    : : "+. ; 
             :  ;   ; ;                    : ;  : \: 
             ;  :   ; :                    ;:   ;  : 
            : \  ;  :  ;                  : ;  /  :: 
            ;  ; :   ; :                  ;   :   ;: 
            :  :  ;  :  ;                : :  ;  : ; 
            ;\    :   ; :                ; ;     ; ; 
            : `."-;   :  ;              :  ;    /  ; 
             ;    -:   ; :              ;  : .-"   : 
             :\     \  :  ;            : \.-"      : 
              ;`.    \  ; :            ;.'_..-=  / ; 
              :  "-.  "-:  ;          :/."      .'  :
               \         \ :          ;/  __        :
                \       .-`.\        /t-""  ":-+.   :
                 `.  .-"    `l    __/ /`. :  ; ; \  ;
                   \   .-" .-"-.-"  .' .'j \  /   ;/ 
                    \ / .-"   /.     .'.' ;_:'    ;  
                     :-""-.`./-.'     /    `.___.'   
                           \ `t  ._  /               
                            "-.t-._:'                

-->

<!--
    
    So you'd like to know how to use impress.js?
    
    You've made the first, very important step - you're reading the source code.
    And that's how impress.js presentations are built - with HTML and CSS code.
    
    Believe me, you need quite decent HTML and CSS skills to be able to use impress.js effectively.
    More importantly, you need to be a designer. There are no default styles or layouts for impress.js presentations.
    
    You need to design and build it by hand.
    
    So...
    
    Would you still like to know how to use impress.js?
    
-->

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=1024" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>impress.js | presentation tool based on the power of CSS3 transforms and transitions in modern browsers | by Bartek Szopka @bartaz</title>
    
    <meta name="description" content="impress.js is a presentation tool based on the power of CSS3 transforms and transitions in modern browsers and inspired by the idea behind prezi.com." />
    <meta name="author" content="Bartek Szopka" />

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />

    <!--
        
        Impress.js doesn't depend on any external stylesheets. It adds all of the styles it needs for the
        presentation to work.
        
        This style below contains styles only for demo presentation. Browse it to see how impress.js
        classes are used to style presentation steps, or how to apply fallback styles, but I don't want
        you to use them directly in your presentation.
        
        Be creative, build your own. We don't really want all impress.js presentations to look the same,
        do we?
        
        When creating your own presentation get rid of this file. Start from scratch, it's fun!
        
    -->
    <link href="/public/js/plugins/impress.js/css/impress-demo.css" rel="stylesheet" />
</head>

<!--
    
    Body element is used by impress.js to set some useful class names, that will allow you to detect
    the support and state of the presentation in CSS or other scripts.
    
    First very useful class name is `impress-not-supported`. This class means, that browser doesn't
    support features required by impress.js, so you should apply some fallback styles in your CSS.
    It's not necessary to add it manually on this element. If the script detects that browser is not
    good enough it will add this class, but keeping it in HTML means that users without JavaScript
    will also get fallback styles.
    
    When impress.js script detects that browser supports all required features, this class name will
    be removed.
    
    The class name on body element also depends on currently active presentation step. More details about
    it can be found later, when `hint` element is being described.
    
-->
<body class="impress-not-supported">

<!--
    For example this fallback message is only visible when there is `impress-not-supported` class on body.
-->
<div class="fallback-message">
    <p>Your browser <b>doesn't support the features required</b> by impress.js, so you are presented with a simplified version of this presentation.</p>
    <p>For the best experience please use the latest <b>Chrome</b>, <b>Safari</b> or <b>Firefox</b> browser.</p>
</div>

<ykg:content></ykg:content>

<script src="/public/js/plugins/impress.js/js/impress.js"></script>
<script>impress().init();</script>

<!--
    
    The `impress()` function also gives you access to the API that controls the presentation.
    
    Just store the result of the call:
    
        var api = impress();
    
    and you will get three functions you can call:
    
        `api.init()` - initializes the presentation,
        `api.next()` - moves to next step of the presentation,
        `api.prev()` - moves to previous step of the presentation,
        `api.goto( idx | id | element, [duration] )` - moves the presentation to the step given by its index number
                id or the DOM element; second parameter can be used to define duration of the transition in ms,
                but it's optional - if not provided default transition duration for the presentation will be used.
    
    You can also simply call `impress()` again to get the API, so `impress().next()` is also allowed.
    Don't worry, it wont initialize the presentation again.
    
    For some example uses of this API check the last part of the source of impress.js where the API
    is used in event handlers.
    
-->

</body>
</html>

<!--
    
    Now you know more or less everything you need to build your first impress.js presentation, but before
    you start...
    
    Oh, you've already cloned the code from GitHub?
    
    You have it open in text editor?
    
    Stop right there!
    
    That's not how you create awesome presentations. This is only a code. Implementation of the idea that
    first needs to grow in your mind.
    
    So if you want to build great presentation take a pencil and piece of paper. And turn off the computer.
    
    Sketch, draw and write. Brainstorm your ideas on a paper. Try to build a mind-map of what you'd like
    to present. It will get you closer and closer to the layout you'll build later with impress.js.
    
    Get back to the code only when you have your presentation ready on a paper. It doesn't make sense to do
    it earlier, because you'll only waste your time fighting with positioning of useless points.
    
    If you think I'm crazy, please put your hands on a book called "Presentation Zen". It's all about 
    creating awesome and engaging presentations.
    
    Think about it. 'Cause impress.js may not help you, if you have nothing interesting to say.
    
-->

<!--
    
    Are you still reading this?
    
    For real?
    
    I'm impressed! Feel free to let me know that you got that far (I'm @bartaz on Twitter), 'cause I'd like
    to congratulate you personally :)
    
    But you don't have to do it now. Take my advice and take some time off. Make yourself a cup of coffee, tea,
    or anything you like to drink. And raise a glass for me ;)
    
    Cheers!
    
-->

