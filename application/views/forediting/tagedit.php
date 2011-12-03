<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
	<div class="page-header">
	<h1>Tag Edit Form</h1>
	</div>
<div class="row">
    <div class="span4 columns">
      <h2>Default styles</h2>
      <p><a class="btn primary" href="/forediting/tagdelete/<?=$results->row()->idtagtypes?>">Delete</a></p>
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
          <legend>Tag Edit Form</legend>
	  
          <div class="clearfix">
            <label for="description">Description</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="description" size="30" type="text" value="<?=$results->row()->description?>">
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
