---
title: 'Iteration Programming Patterns'
morea_id: module-matlab-iteration-patterns
morea_type: module
published: true
---
<div class="html5-video" id="screencap-matlab-looping-programming-patterns"
data-file="/ef105-2019-08/modules/video/matlab-iteration/LoopProgrammingPatterns"></div>

We can create two distinct patterns when adding loops to the mix.
1. When the read, execute (evaluate), and print blocks are contained within the loop body, we have the Read, Evaluate (Execute), Print Loop, or [REPL]().
   - A REPL pattern is appropriate when you need to produce some kind of output for every item in a list.
2. When the read and execute parts are within the body of the loop, and the print parts are outside the body, after the loop, we have a sponge pattern.
   - A sponge pattern is appropriate when you need to produce only summary information about the contents of a list.
