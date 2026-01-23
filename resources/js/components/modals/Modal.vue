<script setup lang="ts">
import Card from '../cards/Card.vue';

    defineEmits(['close'])
</script>

<template>
    <!-- <script type="text/x-template" id="modal-template"> -->
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper" @click="$emit('close')">
            <Card class="modal-container w-[400px]" @click.prevent.stop="() => {}">

              <div class="modal-header">
                <slot name="header">
                  default header
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                  default body
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  default footer
                  <button class="modal-default-button" @click="$emit('close')">
                    OK
                  </button>
                </slot>
              </div>
            </Card>
          </div>
        </div>
      </transition>
    <!-- </script> -->
</template>