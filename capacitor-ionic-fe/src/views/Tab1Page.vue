<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Tab 1</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Tab 1</ion-title>
        </ion-toolbar>
      </ion-header>


      <ion-grid>
        <ion-row>
          <ion-col>
            <ion-button fill="outline" :icon="heart">Default</ion-button>
          </ion-col>
        </ion-row>
        <ion-row>
          <ion-col>
            <ion-button size="large">
              <ion-icon slot="icon-only" :ios="logoApple" :md="settingsSharp"></ion-icon>
            </ion-button>
            <ion-button>
              <ion-icon slot="start" :icon="star"></ion-icon>
              Left Icon
            </ion-button>
            <ion-button color="warning">Default</ion-button>
          </ion-col>
        </ion-row>
        <ion-row>
          <ion-col>
            <ion-button id="present-alert">Click Me</ion-button>
            <ion-alert
                trigger="present-alert"
                header="A Short Title Is Best"
                sub-header="A Sub Header Is Optional"
                message="A message should be a short, complete sentence."
                :buttons="alertButtons"
            ></ion-alert>
          </ion-col>
        </ion-row>
        <ion-row>
          <ion-col>
            <ion-button @click="setOpen()">Click Me</ion-button>
            <div v-if="isOpen">
              scemo chi legge
            </div>
          </ion-col>
        </ion-row>
      </ion-grid>
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import {ref} from 'vue';
import {IonPage, IonHeader, IonToolbar, IonTitle, IonContent, IonAlert} from '@ionic/vue';
import {IonButton, IonIcon} from '@ionic/vue';
import {heart, logoApple, settingsSharp, star} from 'ionicons/icons';

const alertButtons = ['Action', 'ACtion 2'];

const isOpen = ref(false);

const setOpen = () => {
  isOpen.value = !isOpen.value;
};

</script>