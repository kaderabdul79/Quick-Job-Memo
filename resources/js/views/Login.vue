<template>
    <div id="login" class="h-100 bg-blue-lighten-1 pa-3 rounded">
        <v-sheet width="500" class="mx-auto">
            <div class="text-h3 bg-blue-darken-2 text-center py-4">Login</div>
            <v-form class="pa-3" fast-fail>
                <v-text-field
                    v-model="email"
                    label="email"
                ></v-text-field>

                <v-text-field
                    v-model="password"
                    label="password"
                ></v-text-field>

            <v-btn type="submit" block class="mt-2 bg-blue-darken-2">Submit</v-btn>
            </v-form>
        </v-sheet>
    </div>
</template>

<script setup>

</script>

<style scoped>
div#login {
    display: flex;
    align-items: center;
}
div.v-card-item{
    padding: 0px !important;
    background-color: red;
}
.social-login a .v-card-item{
    padding: 0px !important;
    background-color: red;
}
</style>