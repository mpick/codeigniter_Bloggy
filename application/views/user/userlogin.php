<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
	<div class="page-header">
	<h1><?=$subtitle?></h1>
	</div>
<div class="row">
    <div class="span4 columns">
      <h2>Default styles</h2>
      <p>All forms are given default styles to present them in a readable and scalable way. Styles are provided for text inputs, select lists, textareas, radio buttons and checkboxes, and buttons.</p>
    </div>
    <div class="span12 columns">
      <?=form_open(uri_string())?>
        <fieldset>
          <legend>Edit Form</legend>
          <div class="clearfix">
            <label for="email">Email</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="email" size="30" type="text" value="<?=set_value('email')?>">
            </div>
          </div><!-- /clearfix -->
          <div class="clearfix">
            <label for="password">Password</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="password" size="30" type="password" value="<?=set_value('password')?>">
            </div>
          </div><!-- /clearfix -->
          <div class="actions">
            <button type="submit" class="btn primary">Save Changes</button>&nbsp;<button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>	
	
</div>
