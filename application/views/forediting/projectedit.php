<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
<div class="page-header">
<h1>Project Actions</h1>
</div>	
	<div class="row">
		<div class="span4 columns">
			<h2>Moar!</h2>
			<p>Other cool stuff you can add to the project</p>
		</div>
		<div class="span12 columns">
			<div class="well">
			<a class="btn" href="/forediting/milestone/<?=$projectid?>">View Milestones</a>
			<a class="btn" href="/forediting/milestoneadd/<?=$projectid?>">Add Milestone</a>
			</div>
		</div>
	</div>
<div class="page-header">
<h1>Project Entry Add Form</h1>
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
	  <legend>Project Edit Form</legend>

	  <div class="clearfix">
	    <label for="title">Title</label>
	    <div class="input">
	      <input class="xlarge" id="xlInput" name="title" size="30" type="text" value="<?=$results->row()->title?>">
	    </div>
	  </div><!-- /clearfix -->

	  <div class="clearfix">
	    <label for="sdate">Start Date</label>
	    <div class="input">
	      <input class="xlarge" id="xlInput" name="sdate" size="30" type="text" value="<?=$results->row()->startdate?>">
	    </div>
	  </div><!-- /clearfix -->

	  <div class="clearfix">
	    <label for="edate">End Date</label>
	    <div class="input">
	      <input class="xlarge" id="xlInput" name="edate" size="30" type="text" value="<?=$results->row()->enddate?>">
	    </div>
	  </div><!-- /clearfix -->

	  <div class="clearfix">
	    <label for="compname">Company Name</label>
	    <div class="input">
	      <input class="xlarge" id="xlInput" name="compname" size="30" type="text" value="<?=$results->row()->companyname?>">
	    </div>
	  </div><!-- /clearfix -->


	  <div class="clearfix">
	    <label for="compurl">Company URL</label>
	    <div class="input">
	      <input class="xlarge" id="xlInput" name="compurl" size="30" type="text" value="<?=$results->row()->companyurl?>">
	    </div>
	  </div><!-- /clearfix -->


	  <div class="clearfix">
	    <label for="compperson">Contact Person</label>
	    <div class="input">
	      <input class="xlarge" id="xlInput" name="compperson" size="30" type="text" value="<?=$results->row()->companycontactperson?>">
	    </div>
	  </div><!-- /clearfix -->


	  <div class="clearfix">
	    <label for="ccpersonemail">CPerson Email</label>
	    <div class="input">
	      <input class="xlarge" id="xlInput" name="ccpersonemail" size="30" type="text" value="<?=$results->row()->companycontactpersonemail?>">
	    </div>
	  </div><!-- /clearfix -->


	  <div class="clearfix">
	    <label for="body">Body</label>
	    <div class="input">
	      <textarea class="xxlarge" id="textarea" name="body"><?=$results->row()->note?></textarea>
	      <span class="help-block">
		Block of help text to describe the field above if need be.
	      </span>
	    </div>
	  </div><!-- /clearfix -->	  
	<div class="clearfix">
	    <label id="optionsCheckboxes">Active</label>
	    <div class="input">
	      <ul class="inputs-list">
		<li>
		  <label>
		    <input type="checkbox" name="active" value="1" <?=$results->row()->active==1 ? 'checked' : ''?>>
		    <span>If this in uncheck, this project will not be visible online</span>
		  </label>
		</li>	
	      </ul>
	      <span class="help-block">
		<strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.
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
