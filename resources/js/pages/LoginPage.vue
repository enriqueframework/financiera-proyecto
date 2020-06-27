<template>

        <v-row align="center" justify="center">
                <v-col col="12" md="4" sm="6">
                    <v-card>
                    <v-card-title>Login</v-card-title>
                    <v-card-text>
                        <v-text-field
                            prepend-icon="mdi-account"
                            v-model="credentials.email"
                           label="Usuario">
                        </v-text-field>
                        
                        <v-text-field
                           label="Contraseña"
                           v-model="credentials.password"
                           prepend-icon="mdi-lock"
                           :append-icon="showPassword ? 'mdi-eye': 'mdi-eye-off'"
                           :type="showPassword ? 'text': 'password'"
                           @click:append="showPassword = !showPassword"
                           >
                        </v-text-field>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="primary" @click="login">Ingresar</v-btn>
                    </v-card-actions>
                    </v-card>
                </v-col>
        </v-row>
</template>
<script>
export default {
    name: 'Login',
    data: () => ({
        showPassword: false,
        credentials: {
            email: 'administrador@hotmail.com',
            password: '12345678',
        }
    }),

    
    methods: {
        login() {
            this.$store.dispatch('login', this.credentials);
        }
    }
}
</script>