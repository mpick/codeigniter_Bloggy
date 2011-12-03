<div class="container">
	<div class="hero-unit">
		<h1><?=$maintitle?></h1>
	</div>
	<div class="page-header">
	<h1>Blog Entry Add Form</h1>
	</div>
<div class="row">
    <div class="span4 columns">
      <h2>Default styles</h2>
      <p>All forms are given default styles to present them in a readable and scalable way. Styles are provided for text inputs, select lists, textareas, radio buttons and checkboxes, and buttons.</p>
    </div>
    <div class="span12 columns">
      <?=form_open(uri_string())?>
        <fieldset>
          <legend>Entry Add Form</legend>
          <div class="clearfix">
            <label for="title">Title</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="title" size="30" type="text" value="<?=set_value('title')?>">
            </div>
          </div><!-- /clearfix -->
          <div class="clearfix">
            <label for="subtitle">Sub Title</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="subtitle" size="30" type="text" value="<?=set_value('subtitle')?>">
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
     <div class="clearfix">
            <label id="optionsCheckboxes">Active</label>
            <div class="input">
              <ul class="inputs-list">
                <li>
                  <label>
                    <input type="checkbox" name="active" value="1" <?=set_value('active') ? 'checked' : ''?>>
                    <span>If this in uncheck, this entry will not be visible online</span>
                  </label>
                </li>
              </ul>
              <span class="help-block">
                <strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.
              </span>
            </div>
          </div><!-- /clearfix -->
	<div class="clearfix">
            <label for="normalSelect">Select Tags</label>
            <div class="input">
              <select name="tags[]" multiple="multiple" id="normalSelect" size="2">
			<?php foreach($tags->result_array() as $row):?>
				<option value="<?=$row['idtagtypes']?>"><?=$row['description']?></option>
			<?php endforeach;?>
              </select>
            </div>
          </div><!-- /clearfix -->
          <div class="clearfix">
            <label for="addtags">New Tags</label>
            <div class="input">
              <input class="xlarge" id="xlInput" name="addtags" size="30" type="text" value="<?=set_value('addtags')?>">
              <span class="help-block">
                <strong>Note:</strong> Separate by comma
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
