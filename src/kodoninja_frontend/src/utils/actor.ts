// src/utils/actor.ts
import { Actor, HttpAgent } from "@dfinity/agent";
import { idlFactory } from "../declarations/kodoninja"; // Ensure this path is correct
import { _SERVICE } from "../declarations/kodoninja/kodoninja.did"; // Ensure this path is correct

const canisterId = "bkyz2-fmaaa-aaaaa-qaaaq-cai"; // Updated backend canister ID

export const createActor = () => {
  const agent = new HttpAgent({ host: "http://localhost:4943" });

  // For local development, fetch the root key
  if (process.env.NODE_ENV !== "production") {
    agent.fetchRootKey().catch((err) => {
      console.error("Unable to fetch root key:", err);
    });
  }

  return Actor.createActor<_SERVICE>(idlFactory, {
    agent,
    canisterId,
  });
};

export const kodoninja = createActor();