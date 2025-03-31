// src/utils/assetActor.ts
import { Actor, HttpAgent } from "@dfinity/agent";
import { idlFactory as assetIdlFactory } from "../declarations/kodoninja_assets"; // Generated after deployment

const canisterId = "YOUR_ASSET_CANISTER_ID"; // Replace with the actual canister ID after deployment

export const createAssetActor = () => {
  const agent = new HttpAgent({ host: "http://localhost:4943" });

  if (process.env.NODE_ENV !== "production") {
    agent.fetchRootKey().catch((err) => {
      console.error("Unable to fetch root key:", err);
    });
  }

  return Actor.createActor(assetIdlFactory, {
    agent,
    canisterId,
  });
};

export const assetActor = createAssetActor();
