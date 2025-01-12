<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 2</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Tab 2</ion-title>
        </ion-toolbar>
      </ion-header>
      <div id="container">
        <ion-button @click="callBackend" expand="full">Load Quotes</ion-button>

        <ion-slides v-if="quotes.length > 0" pager="true">
          <ion-slide v-for="quote in quotes" :key="quote.id">
            <ion-card>
              <ion-card-header>
                <ion-card-title>{{ quote.author }}</ion-card-title>
              </ion-card-header>
              <ion-card-content>
                {{ quote.quote }}
              </ion-card-content>
            </ion-card>
          </ion-slide>
        </ion-slides>

        <div v-else class="no-data">
          <p>No quotes available. Click the button to load them!</p>
        </div>
      </div>
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import {
  IonPage,
  IonHeader,
  IonToolbar,
  IonTitle,
  IonContent,
  IonButton,
  IonCard,
  IonCardHeader,
  IonCardTitle,
  IonCardContent,
} from '@ionic/vue';
import axios from 'axios';
import {ref} from 'vue';

const quotes = ref([]);

const callBackend = async () => {
  try {
    const response = await axios.get('http://capacitor-be.test/api/quotes');
    quotes.value = response.data.data;
  } catch (error) {
    console.error('Errore nel recuperare i dati:', error);
  }
};

</script>
