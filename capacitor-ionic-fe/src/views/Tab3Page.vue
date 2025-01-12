<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Click Game</ion-title>
      </ion-toolbar>
    </ion-header>
    <ion-content :fullscreen="true" class="game-container">
      <ion-header collapse="condense">
        <ion-toolbar>
          <ion-title size="large">Click Game</ion-title>
        </ion-toolbar>
      </ion-header>

      <div class="scoreboard">
        <h2>Clicks: {{ clicks }}</h2>
      </div>

      <div class="game-area">
        <div
          class="circle"
          :style="{ top: position.y + 'px', left: position.x + 'px' }"
          @click="handleClick"
        ></div>
      </div>
    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import {
  IonPage,
  IonHeader,
  IonToolbar,
  IonTitle,
  IonContent,
} from '@ionic/vue';

const clicks = ref(0); // Numero di click
const position = ref({ x: 100, y: 100 }); // Posizione del cerchio

const handleClick = () => {
  clicks.value += 1;

  position.value = {
    x: Math.random() * (window.innerWidth - 50), // Larghezza dello schermo meno il diametro del cerchio
    y: Math.random() * (window.innerHeight - 150), // Altezza dello schermo meno header e margine
  };
};
</script>

<style scoped>
.game-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;
}

.scoreboard {
  text-align: center;
  margin-top: 20px;
}

.game-area {
  position: relative;
  width: 100%;
  height: 80%;
  overflow: hidden;
}

.circle {
  width: 50px;
  height: 50px;
  background-color: #ff6347;
  border-radius: 50%;
  position: absolute;
  cursor: pointer;
  transition: top 0.2s ease, left 0.2s ease;
}
</style>

