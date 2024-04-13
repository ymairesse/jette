<h2>
  <u>[{if $dataUser.civilite == 'F'}Madame
      {elseif $dataUser.civilite == 'M'}Monsieur
      {else}M./Mme 
    {/if} 
    {$dataUser.prenom} {$dataUser.nom}]
  </u>
</h2>

<form autocomplete="false" id="fakeEditUser" class="mb-3">

    <div class="row">

      <div class="form-group pb-3 col-2">
        <label for="genre">
          <i class="fa fa-female" aria-hidden="true"></i>
          <i class="fa fa-male" aria-hidden="true"></i>
          <i class="fa fa-genderless" aria-hidden="true"></i
        ></label>
        <input type="text" class="form-control openModal" name="civilite" id="civilite"
        readonly 
        value="{if $dataUser.civilite == 'F'}Madame
            {elseif $dataUser.civilite == 'M'}Monsieur
            {elseif $dataUser.civilite == 'X'}Mme/M.
            {else}-
          {/if}"
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
          value="{$dataUser.nom|default:''}"
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
          value="{$dataUser.prenom|default:''}"
          placeholder="Prénom"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-2">
        <label for="approuve">Approuvé</label>
        <input type="hidden" id="approuveFake" name="approuveFake" value="{$dataUser.approuve|default:0}">
        <div class="btn-group w-100 openModal" role="group" aria-label="Approuvé">
          <button 
            type="button" 
            class="btn {if $dataUser.approuve == 1}btn-success{else}btn-outline-success{/if}" 
            data-value="1"
            >
            Oui
          </button>
          <button 
            type="button" 
            class="btn {if $dataUser.approuve == 0}btn-danger{else}btn-outline-danger{/if}" 
            data-value="0"
            >
            Non
          </button>
        </div>
        {if $dataUser == $self}
        <div class="helpBlock form-text">Non modifiable</div>
        {/if}
        
      </div>

      <div class="form-group pb-3 col-3">
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
          value="{$dataUser.pseudo|default:''}"
          placeholder="Pseudo"
          readonly
        />
      </div>

      <div class="form-group pb-3 col-md-3 col-12">
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
            placeholder="{if $dataUser.md5passwd == ''}Mot de passe{else}Au moins 6 caractères{/if}"
            aria-describedby="addonMdp"
            readonly
          />
        </div>
      </div>

      <div class="form-group pb-3 col-md-3 col-12">
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
            placeholder="{if $dataUser.md5passwd == ''}Mot de passe{else}Au moins 6 caractères{/if}"
            aria-describedby="addonMdp"
            readonly
          />
        </div>
      </div>

      <div class="form-group pb-3 col-md-3 col-12">
        <label for="experience">Expérience</label>
        <div class="openModal">
          <select name="experience" id="experience" class="form-control" readonly>
            <option value="0"{if $dataUser.experience == 0} selected{/if}>De base</option>
            <option value="1"{if $dataUser.experience == 1} selected{/if}>Bonne</option>
            <option value="2"{if $dataUser.experience == 2} selected{/if}>Très bonne</option>
          </select>
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
          value="{$dataUser.droits|default:'oxfam'}"
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
          value="{$dataUser.mail|default:''}"
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
          value="{$dataUser.telephone|default:''}"
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
          value="{$dataUser.adresse|default:''}"
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
          value="{$dataUser.cpost|default:''}"
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
          value="{$dataUser.commune|default:''}"
          placeholder="Commune"
          readonly
        />
      </div>
    
    </div>
  
</form>

<button type="button" class="w-100 btn btn-warning" id="btn-editUserProfile"><i class="fa fa-edit"></i> Modifier cette fiche</button>
