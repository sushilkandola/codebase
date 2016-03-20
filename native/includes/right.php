<div id="sidebar">
      <div>
        <?php
			include('fb_like_box.php');
		?>
      </div>
      <div class="cb lh20">&nbsp;</div>
      <div>
		<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
        <script>
            new TWTR.Widget({
            version: 2,
            type: 'profile',
            rpp: 4,
            interval: 30000,
            width: 294,
            height: 250,
            theme: 
            {
                shell: 
                {
                    background: '#2497c6',
                    color: '#fff'
                },
                tweets: 
                {
                    background: '#ffffff',
                    color: '#999999',
                    links: '#e5322c'
                }
            },
            features: 
            {
                scrollbar: true,
                loop: false,
                live: false,
                behavior: 'all'
            }
            }).render().setUser('NativeWebs').start();
        </script>
      </div>
</div>