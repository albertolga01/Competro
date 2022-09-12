/*************************************************************************
    This code is from Dynamic Web Coding at dyn-web.com
    Copyright 2004-5 by Sharon Paine 
    See Terms of Use at www.dyn-web.com/bus/terms.html
    regarding conditions under which you may use this code.
    This notice must be retained in the code as is!
*************************************************************************/

// setDefaults arguments: size unit, default size, minimum, maximum
// optional array of elements or selectors to apply these defaults to
// set arguments: default size, minimum, maximum
// array of elements or selectors to apply these settings to
//Default,Minimo, Maximo
//dw_fontSizerDX.setDefaults("em", 1, .9, 1.4, ['div#content p'] );
dw_fontSizerDX.setDefaults("em", .7, .6, 1.2, ['div#content'] );
//dw_fontSizerDX.setDefaults("em", 1, .9, 1.4, ['div#content li'] );
//dw_fontSizerDX.set(1.7, 1.5, 2.1, ['div#content h1'] );
//dw_fontSizerDX.set(1.5, 1.3, 1.9, ['div#content h2'] );
//dw_fontSizerDX.set(1, .9, 1.4, ['div#content h5'] );
dw_fontSizerDX.init();
/*
h1: 1.7em;
h2: 1.5em;
h3: 1.3em;
h4: 1.1em;
h5: 1em;
*/