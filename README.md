Jetpack Mods
====================

A WordPress plugin that provides several enhancements to the JetPack plugin

## Publicize Module Changes

### Share to Twitter
 
 - **Aside Post Format**: When a post with an *Aside* post format is published and the entire content of the post + the URL will fit inside a Tweet (<= 140 characters), then this mod well tell Jetpack Publicize to post the entire body of the post to Twitter + the URL (instead of posting only the Title + URL). 

    Instead of `Example Title http://example.com/example/` the tweet becomes `This is the whole aside post content, less than or equal to 116 characters (to leave room for the URL). http://example.com/example/`. If the full content body is too long to fit on Twitter, the standard Jetpack format of Title + URL is used.
 
 - **Quote Post Format**: When a post with an *Quote* post format is published and the entire content of the post + the URL will fit inside a Tweet (<= 140 characters), then this mod well tell Jetpack Publicize to post the entire body of the post to Twitter + the URL (instead of posting only the Title + URL). 

    Instead of `Quote Title http://example.com/example-quote/` the tweet becomes `"Simplicity is the ultimate sophistication." - Leonardo Da Vinci http://example.com/example-quote/`. 
    
    Note that if the quote content doesn't contain double-quotes around the quote and it _does_ contain `<cite>` tags around the author of the quote, then this mod will automatically add double-quotes around the quote before posting to Twitter. A post content of `Simplicity is the ultimate sophistication. <cite>- Leonardo Da Vinci</cite>` gets posted to Twitter as `"Simplicity is the ultimate sophistication." - Leonardo Da Vinci http://example.com/example-quote/` (notice the added double-quotes). This only works if you use `<cite>` tags.
    
    If the full content body is too long to fit on Twitter, the standard Jetpack format of Title + URL is used.
