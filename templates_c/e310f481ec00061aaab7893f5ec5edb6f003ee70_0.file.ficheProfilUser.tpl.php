<?php
/* Smarty version 4.3.1, created on 2024-04-08 09:31:07
  from '/home/yves/www/newOxfam/templates/users/ficheProfilUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66139d3b21cc39_39795031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e310f481ec00061aaab7893f5ec5edb6f003ee70' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/users/ficheProfilUser.tpl',
      1 => 1712065931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66139d3b21cc39_39795031 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>
  <u>[<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'F') {?>Madame
      <?php } elseif ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'M') {?>Monsieur
      <?php } else { ?>M./Mme 
    <?php }?> 
    <?php echo $_smarty_tpl->tpl_vars['dataUser']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataUser']->value['nom'];?>
]
  </u>
</h2>

<form autocomplete="false" id="fakeEditUser">
  <div class="container-fluid">

    <div class="row">

      <div class="form-group pb-3 col-2">
        <label for="genre">
          <i class="fa fa-female" aria-hidden="true"></i>
          <i class="fa fa-male" aria-hidden="true"></i>
          <i class="fa fa-genderless" aria-hidden="true"></i
        ></label>
        <input type="text" class="form-control openModal" name="civilite" id="civilite"
        readonly 
        value="<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'F') {?>Madame
            <?php } elseif ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'M') {?>Monsieur
            <?php } elseif ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'X') {?>Mme/M.
            <?php } else { ?>-
          <?php }?>"
          placeholder="Civ."
        />
      </div>

      <div class="form-group pb-3 col-4">
        <label for="nom">Nom</label>
        <input
          type="text"
          class="form-control openModal"
          name="nomx"
          id="nomx"
          autocomplete="false"
          value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['nom'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
          placeholder="Nom"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-4">
        <label for="prenom">Prénom</label>
        <input
          type="text"
          class="form-control openModal"
          name="prenomx"
          id="prenomx"
          autocomplete="false"
          value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['prenom'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
          placeholder="Prénom"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-2">
        <label for="approuve">Approuvé</label>
        <input type="hidden" id="approuveFake" name="approuveFake" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['approuve'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
        <div class="btn-group w-100 openModal" role="group" aria-label="Approuvé">
          <button 
            type="button" 
            class="btn <?php if ($_smarty_tpl->tpl_vars['dataUser']->value['approuve'] == 1) {?>btn-success<?php } else { ?>btn-outline-success<?php }?>" 
            data-value="1"
            >
            Oui
          </button>
          <button 
            type="button" 
            class="btn <?php if ($_smarty_tpl->tpl_vars['dataUser']->value['approuve'] == 0) {?>btn-danger<?php } else { ?>btn-outline-danger<?php }?>" 
            data-value="0"
            >
            Non
          </button>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['dataUser']->value == $_smarty_tpl->tpl_vars['self']->value) {?>
        <div class="helpBlock form-text">Non modifiable</div>
        <?php }?>
        
      </div>

      <div class="form-group pb-3 col-4">
        <label for="pseudo">
          <i class="fa fa-user-secret" aria-hidden="true"></i>
          Pseudo
        </label>
        <input
          type="text"
          class="form-control openModal"
          name="pseudo"
          id="pseudo"
          maxlength="12"
          autocomplete="false"
          value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['pseudo'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
          placeholder="Pseudo"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-md-4 col-12">
        <label for="mdp">Mot de passe</label>
        <div class="input-group">
          <span class="input-group-text addonMdp"
            ><i class="fa fa-eye"></i
          ></span>
          <input
            type="password"
            class="form-control openModal"
            name="pwdFake"
            id="pwdFake"
            autocomplete="false"
            value=""
            placeholder="<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['md5passwd'] == '') {?>Mot de passe<?php } else { ?>Au moins 6 caractères<?php }?>"
            aria-describedby="addonMdp"
            readonly
          />
        </div>
      </div>

      <div class="form-group pb-3 col-md-4 col-12">
        <label for="mdp">Mot de passe</label>
        <div class="input-group openModal">
          <span class="input-group-text addonMdp"
            ><i class="fa fa-eye"></i
          ></span>
          <input
            type="password"
            class="form-control"
            name="pwdFake2"
            id="pwdFake2"
            autocomplete="false"
            value=""
            placeholder="<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['md5passwd'] == '') {?>Mot de passe<?php } else { ?>Au moins 6 caractères<?php }?>"
            aria-describedby="addonMdp"
            readonly
          />
        </div>
      </div>


      <div class="form-group pb-3 col-4">
        <label for="droits"
          ><i class="fa fa-user-plus" aria-hidden="true"></i> Droits</label
        >
        <input
          type="text"
          id="droitsFake"
          name="droitsFake"
          class="form-control openModal"
          value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['droits'] ?? null)===null||$tmp==='' ? 'oxfam' ?? null : $tmp);?>
"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-4">
        <label for="mail">
          <i class="fa fa-send" aria-hidden="true"></i>
          Adresse mail
        </label>
        <input
          type="mail"
          class="form-control openModal"
          name="mail"
          id="mail"
          value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['mail'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
          placeholder="Adresse mail"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-4">
        <label for="telephone">
          <i class="fa fa-phone" aria-hidden="true"></i>
          Téléphone
        </label>
        <input
          type="tel"
          class="form-control openModal"
          name="telephone"
          id="telephone"
          autocomplete="false"
          value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['telephone'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
          placeholder="Téléphone"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-md-5 col-12">
        <label for="adresse">Adresse</label>
        <input
          type="text"
          class="form-control openModal"
          name="adresse"
          autocomplete="false"
          id="adresse"
          value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['adresse'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
          placeholder="Adresse rue / numéro"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-md-3 col-4">
        <label for="cpost">Code Postal</label>
        <input
          type="text"
          class="form-control openModal"
          name="cpost"
          autocomplete="false"
          id="cpost"
          value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['cpost'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
          placeholder="Code Postal"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-md-4 col-8">
        <label for="commune">Commune</label>
        <input
          type="text"
          class="form-control openModal"
          name="commune"
          autocomplete="false"
          id="commune"
          value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['commune'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
          placeholder="Commune"
          readonly
        />
      </div>
    
    </div>
    <button type="button" class="w-100 btn btn-warning" id="btn-editUserProfile"><i class="fa fa-edit"></i> Modifier cette fiche</button>
  </div>
</form>

<?php }
}
