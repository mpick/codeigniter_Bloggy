<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
	<div class="page-header">
	<h1>Milestone Entry Add Form</h1>
	</div>
<div class="row">
    <div class="span4 columns">
      <h2>Default styles</h2>
      <p>All forms are given default styles to present them in a readable and scalable way. Styles are provided for text inputs, select lists, textareas, radio buttons and checkboxes, and buttons.</p>
    </div>
    <div class="span12 columns">
<?php if(validation_errors() != ''):?>	
<div class="alert-message error">
        <a class="close" href="#">×</a>
        <p><strong>Oh snap!</strong> <?=validation_errors()?></p>
</div>	
<?php endif;?>	    
      <?=form_open(uri_string())?>
        <fieldset>
          <legend>Milestone Add Form</legend>
	  
          <div class="clearfix">
            <label for="name">Name</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="name" size="30" type="text" value="<?=set_value('name')?>">
            </div>
          </div><!-- /clearfix -->
	  
          <div class="clearfix">
            <label for="subtitle">Sub title</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="subtitle" size="30" type="text" value="<?=set_value('subtitle')?>">
            </div>
          </div><!-- /clearfix -->
	  	  
          <div class="clearfix">
            <label for="estrdate">Est Release Date</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="estrdate" size="30" type="text" value="<?=set_value('estrdate')?>">
            </div>
          </div><!-- /clearfix -->

	  	  
          <div class="clearfix">
            <label for="rdate">Release Date</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="rdate" size="30" type="text" value="<?=set_value('rdate')?>">
            </div>
          </div><!-- /clearfix -->
      
	  	  
          <div class="clearfix">
            <label for="body">Body</label>
            <div class="input">
              <textarea class="xxlarge" id="textarea" name="body"><?=set_value('body')?></textarea>
              <span class="help-block">
                Block of help text to describe the field above if need be.
              </span>
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
