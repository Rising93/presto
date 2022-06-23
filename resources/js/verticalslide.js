$(document).ready(function () {
    const loop = document.getElementById('loop_js');
    
    const loopAnim = new TimelineMax({
      repeat: -1 
    });
  
    let loopItem = (window.innerWidth, loop.children[0]);

 loop.appendChild(loopItem.cloneNode(true));







    loopAnim
      .to(loop, 40, { ease: Power0.easeNone, yPercent: -110 })
      .to(loop, 0, { ease: Power0.easeNone, y: -100 });
  
    var mousewheelevent = 'onwheel' in document ? 'wheel' : 'onmousewheel' in document ? 'mousewheel' : 'DOMMouseScroll';
        $(document).on(mousewheelevent,function(e){
            e.preventDefault();
            var delta = e.originalEvent.deltaY ? -(e.originalEvent.deltaY) : e.originalEvent.wheelDelta ? e.originalEvent.wheelDelta : -(e.originalEvent.detail);
            if (delta < 0){
                loopAnim.time(loopAnim.time()+1);
            } else {
              loopAnim.time(loopAnim.time()-1);
            }
        });
  });
