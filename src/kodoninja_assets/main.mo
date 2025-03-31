// src/kodoninja_assets/main.mo
import Blob "mo:base/Blob";
import Map "mo:base/HashMap";
import Text "mo:base/Text";
import Nat "mo:base/Nat";
import Principal "mo:base/Principal";

actor {
  // Store assets: assetId -> (owner, blob)
  let assets = Map.HashMap<Nat, (Principal, Blob)>(0, Nat.equal, func (n) { n });
  var nextAssetId: Nat = 0;

  // Upload an asset
  public shared({ caller }) func uploadAsset(data: Blob): async Nat {
    let assetId = nextAssetId;
    nextAssetId += 1;
    assets.put(assetId, (caller, data));
    assetId
  };

  // Get an asset
  public query func getAsset(assetId: Nat): async ?Blob {
    switch (assets.get(assetId)) {
      case (?(owner, data)) { ?data };
      case null { null };
    }
  };

  // Check if the caller is the owner of the asset
  public query({ caller }) func isAssetOwner(assetId: Nat): async Bool {
    switch (assets.get(assetId)) {
      case (?(owner, _)) { owner == caller };
      case null { false };
    }
  };
};
