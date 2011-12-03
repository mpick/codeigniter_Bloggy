<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
	<div class="page-header">
	<h1>Task Entry Add Form</h1>
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
          <legend>Task Add Form</legend>
	  
          <div class="clearfix">
            <label for="title">Title</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="title" size="30" type="text" value="<?=set_value('title')?>">
            </div>
          </div><!-- /clearfix -->
	  
          <div class="clearfix">
            <label for="duedate">Due Date</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="duedate" size="30" type="text" value="<?=set_value('duedate')?>">
            </div>
          </div><!-- /clearfix -->
	  	  
          <div class="clearfix">
            <label for="ehours">Est Hours</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="ehours" size="30" type="text" value="<?=set_value('ehours')?>">
            </div>
          </div><!-- /clearfix -->

	  	  
          <div class="clearfix">
            <label for="ahours">Actual Hours</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="ahours" size="30" type="text" value="<?=set_value('ahours')?>">
            </div>
          </div><!-- /clearfix -->
	  
          <div class="clearfix">
            <label for="cdate">Completed Date</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="cdate" size="30" type="text" value="<?=set_value('cdate')?>">
            </div>
          </div><!-- /clearfix -->
	  	  
          <div class="clearfix">
            <label for="body">Description</label>
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
