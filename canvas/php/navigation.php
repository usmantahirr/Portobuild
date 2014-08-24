<nav class="editingBar">
	<h3 style="margin: 10px; padding-left: 10px;">Editor</h3>
    
	<select class="form-control" style="margin: 15px; width: 85%">
        <option>Headings (H1, H2 ..)</option>
        <option>Peragraph</option>
        
        <option>Display Picture</option>
        <option>Name</option>
        <option>Profession</option>
        <option>Featured Image 1</option>
        <option>Featured Image 2</option>
        <option>footer</option>    
    </select>
    
	<div id="accordion">
		<!-- accordian section 1: Border Styling -->
		<div>
			<h3><a href="#">Border Style</a></h3>
			<div class="accBody">
				<div class="">
					Border Width: <span class="value" id="bw-val">0px</span>
					<div id="slider" class="sliders"></div>
				</div>

				<div class="">
					<div class="input-group">
						<span class="input-group-addon">Border Color</span>
						<input type="text" class="form-control color" placeholder="Username">
					</div>
				</div>

				<div class="">
					Border Style:
					<select class="form-control">
					  <option>dotted</option>
					  <option>dashed</option>
					  <option>solid</option>
					  <option>double</option>
					</select>
				</div>
			</div>
		</div>

		<div>
			<h3><a href="#">Paddings</a></h3>
			<div class="accBody">
				<div class="">
					Padding Top: <span class="value" id="pdt-val">0px</span>
					<div id="pdt-slider" class="sliders"></div>
				</div>

				<div class="">
					Padding right: <span class="value" id="pdr-val">0px</span>
					<div id="pdr-slider" class="sliders"></div>
				</div>

				<div class="">
					Padding bottom: <span class="value" id="pdb-val">0px</span>
					<div id="pdb-slider" class="sliders"></div>
				</div>

				<div class="">
					Padding left: <span class="value" id="pdl-val">0px</span>
					<div id="pdl-slider" class="sliders"></div>
				</div>
			</div>
		</div>

		<div>
			<h3><a href="#">Margins</a></h3>
			<div class="accBody">
				<div class="">
					Padding Top: <span class="value" id="mrt-val">0px</span>
					<div id="mrt-slider" class="sliders"></div>
				</div>

				<div class="">
					Padding right: <span class="value" id="mrr-val">0px</span>
					<div id="mrr-slider" class="sliders"></div>
				</div>

				<div class="">
					Padding bottom: <span class="value" id="mrb-val">0px</span>
					<div id="mrb-slider" class="sliders"></div>
				</div>

				<div class="">
					Padding left: <span class="value" id="mrl-val">0px</span>
					<div id="mrl-slider" class="sliders"></div>
				</div>
			</div>
		</div>

		<div>
			<h3><a href="#">CSS3 Attributes</a></h3>
			<div class="accBody">
				<b>Box Shadow.</b>
				<hr>
				<div>
					h-shadow <span class="value" id="h-sh-val">0px</span>
					<div id="h-sh-slider" class="sliders"></div>
				</div>
				<div>
					v-shadow <span class="value" id="v-sh-val">0px</span>
					<div id="v-sh-slider" class="sliders"></div>
				</div>
				<div>
					blur <span class="value" id="blr-sh-val">0px</span>
					<div id="blr-sh-slider" class="sliders"></div>
				</div>
				<div>
					spread <span class="value" id="spread-sh-val">0px</span>
					<div id="spread-sh-slider" class="sliders"></div>
				</div>
				<div class="input-group">
					<span class="input-group-addon">Color</span>
					<input type="text" class="form-control color" placeholder="shadow-color">
				</div>
			</div>
		</div>

		<div>
			<h3><a href="#">Background</a></h3>
			<div class="accBody">
				<div class="">
					<div class="input-group">
						<span class="input-group-addon">Background Color</span>
						<input type="text" class="form-control color" placeholder="bg-color">
					</div>
				</div>
			</div>
		</div>

		<div>
			<h3><a href="#">Font</a></h3>
			<div class="accBody">
				<select class="form-control" style="margin: 15px; width: 85%">
			        <optgroup style="font-family:Josefin Sans; font-size: 1.5em; margin: -10px 0px; padding: 0px;" label="">
					    <option>Josefin Sans</option>
					</optgroup>
					<optgroup style="font-family:Lobster; font-size: 1.5em; margin: -10px 0px; padding: 0px;">
					    <option>Lobster</option>
					</optgroup>
					<optgroup style="font-family:Gloria Hallelujah; font-size: 1.5em; margin: -10px 0px; padding: 0px;">
					    <option>Gloria Hallelujah</option>
					</optgroup>
					<optgroup style="font-family:Indie Flower; font-size: 1.5em; margin: -10px 0px; padding: 0px;">
					    <option>Indie Flower</option>
					</optgroup>
					<optgroup style="font-family:Pacifico; font-size: 1.5em; margin: -10px 0px; padding: 0px;">
					    <option>Pacifico</option>
					</optgroup>
  					<optgroup style="font-family:Karla; font-size: 1.5em; margin: -10px 0px; padding: 0px;">
					    <option>Karla</option>
					</optgroup>
					<optgroup style="font-family:Dancing Script; font-size: 1.5em; margin: -10px 0px; padding: 0px;">
					    <option>Dancing Script</option>
					</optgroup>
					<optgroup style="font-family:Roboto; font-size: 1.5em; margin: -10px 0px; padding: 0px;">
					    <option>Roboto</option>
					</optgroup>
					<optgroup style="font-family:Open Sans; font-size: 1.5em; margin: -10px 0px; padding: 0px;">
					    <option>Open Sans</option>
					</optgroup>
			    </select>
			</div>
		</div>
	</div>
</nav>