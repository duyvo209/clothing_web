<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		html{
			scroll-behavior: smooth;
		}
		body{
			margin: 0;
			padding: 0;
		}

		.gotop {
			display: none;
			position: fixed;
			bottom: 120px;
			right: 90px;
			width: 60px;
			height: 60px;
			font-size: 28px;
			background-color: #fff;
			color: #333;
			cursor: pointer;
			outline: none;
			border: #333 3px solid;
			border-radius: 50%;
			transition-duration: 0.2s;
			transition-timing-function: ease-in-out;
			transition-property: background-color, color; 
		}
		
		.gotop:hover, .gotop:focus{
			background-color: #333;
			color: #fff;
		}
		#up{
			position: absolute;
    		transform: translate(-50%, -50%);
		}
		
		.Entrance{
			animation-duration: 0.5s;
			animation-fill-mode: both;
			animation-name: Entrace;
		}
		@keyframes Entrace{
			from{
				opacity: 0;
				transform: translate3d(0, 100%, 0);
			}
			to{
				opacity: 1;
				transform: translate3d(0, 0, 0);
			}
		}

		.Exit{
			animation-duration: 0.25s;
			animation-fill-mode: both;
			animation-name: Exit;
		}
		@keyframes Exit{
			from{
				opacity: 1;
				
			}
			to{
				opacity: 0;
				transform: translate3d(0, 100%, 0);
			}
		}

		


	/*	.pic{
			width: 475px;
			height: 475px;
		}*/

	</style>
	<meta charset="utf-8">
</head>
<body>
	<div id="content">

		<div class="blog">

			<table style="margin-top: 30px;" cellpadding="15">
			<tr>
				<td>
					<img class="pic" src="/blog/7.jpg">
				</td>
				<td>
					<img class="pic" src="/blog/8.jpg">
				</td>
			</tr>
			<tr>
				<td>
					<img class="pic" src="/blog/1.jpg">
				</td>
				<td>
					<img class="pic" src="/blog/2.jpg">
				</td>	
			</tr>
			<tr>
				<td>
					<img class="pic" src="/blog/3.jpg">
				</td>
				<td>
					<img class="pic" src="/blog/4.jpg">
				</td>
			</tr>
			<tr>
				<td>
					<img class="pic" src="/blog/5.jpg">
				</td>
				<td>
					<img class="pic" src="/blog/6.jpg">
				</td>
			</tr>
			<tr>
				<td>
					<img class="pic" src="/blog/9.jpg">
				</td>
				<td>
					<img class="pic" src="/blog/10.jpg">
				</td>
			</tr>
			<tr>
				<td>
					<img class="pic" src="/blog/11.jpg">
				</td>
				<td>
					<img class="pic" src="/blog/12.jpg">
				</td>
			</tr>
			<tr>
				<td>
					<img class="pic" src="/blog/13.jpg">
				</td>
				<td>
					<img class="pic" src="/blog/14.jpg">
				</td>
			</tr>
			<tr>
				<td>
					<img class="pic" src="/blog/15.jpg">
				</td>
				<td>
					<img class="pic" src="/blog/16.jpg">
				</td>
			</tr>
			</table>
		</div>
<!-- 
		<a class="gotop" href=""><i class="fa fa-arrow-up" aria-hidden="true" style="color: black;" ></i></a>
		<div class="up">Lên đầu trang</div> -->
		<button class="gotop" id="gotop">
			<i id="up" class="fa fa-angle-double-up" aria-hidden="true"></i>
		</button>

		<script type="text/javascript">
			const gotop = document.querySelector("#gotop");
			window.addEventListener("scroll", scrollFunction);

			function scrollFunction(){
				if(window.pageYOffset > 2150){
					if(!gotop.classList.contains("Entrance")){
						gotop.classList.remove("Exit");
						gotop.classList.add("Entrance");
						gotop.style.display = "block";
						gotop.style.outline = "none";
					}
					
				}else{
					if(gotop.classList.contains("Entrance")){
						gotop.classList.remove("Entrance");
						gotop.classList.add("Exit");
						setTimeout(function(){
							gotop.style.display = "none";
						}, 250);
						
					}
					
				}
			}

			gotop.addEventListener("click", backToTop);

			function backToTop(){
				window.scrollTo(0, 0);
				// $("html, body").animate({scrollTop: 0}, 2000);
			}
		</script>

		</div>
	</div>
</body>
</html>