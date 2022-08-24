<template>
<div>
    <h1>Contattaci</h1>
    <form @submit.prevent="submitMessage" novalidate>
        <div v-if="successMessage" class="alert alert-success" role="alert">
            {{ successMessage }}
        </div>
        <div v-if="errorMessage" class="alert alert-danger" role="alert">
            {{ errorMessage }}
        </div>

        <div class="mb-3">
            <label class="form-label" for="name">Nome</label>
            <input class="form-control" :class="{'is-invalid': inputserrorMessages.name}" type="text" name="name" id="name" v-model="name">
            <div class="invalid-feedback">
                <ul>
                    <li v-for="error in inputserrorMessages.name" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" :class="{'is-invalid': inputserrorMessages.email}" type="email" name="email" id="email" v-model="email">
            <div class="invalid-feedback">
                <ul>
                    <li v-for="error in inputserrorMessages.email" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="Message">Lasciaci un messaggio</label>
            <textarea class="form-control" :class="{'is-invalid': inputserrorMessages.message}" name="message" id="message" cols="30" rows="10" v-model="message"></textarea>
            <div class="invalid-feedback">
                <ul>
                    <li v-for="error in inputserrorMessages.message" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <input class="form-check-input" :class="{'is-invalid': inputserrorMessages.newsletter}" type="checkbox" name="newsletter" id="newsletter" v-model="mailinglist">
            <label class="form-check-label" for="newsletter">Iscrivimi alla newsletter</label>
            <div class="invalid-feedback">
                <ul>
                    <li v-for="error in inputserrorMessages.newsletter" :key="error">
                        {{ error }}
                    </li>
                </ul>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" :disabled="sending">{{ sending ? 'Sto inviando...' : 'Invia il messaggio' }}</button>
    </form>
</div>

</template>

<script>


export default {
    name: 'PageContacts',
    data(){
        return{
            name: '',
            email: '',
            message: '',
            mailinglist: true,
            successMessage: '',
            errorMessage: '',
            sending: false,
            inputserrorMessages: {},
        }
    },
    methods: {
        submitMessage(){
            this.sending = true;
            axios.post('/api/leads', {
                name: this.name,
                email:this.email,
                message: this.message,
                mailinglist: this.mailinglist,
            })
            .then(res => {
                if(res.data.success) {
                    this.resetForm();
                    this.successMessage = res.data.response;
                } else {
                    this.inputserrorMessages = res.data.response;
                }
            })
            .catch(error => this.errorMessage = 'Errore imprevisto, riprova!')
            .finally(data => this.sending = false);
        },
        resetForm(){
            this.name = '';
            this.email = '';
            this.message = '';
            this.mailinglist = true;
        }
    }


}
</script>

<style lang="scss" >




</style>
