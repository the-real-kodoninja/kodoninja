// src/kodoninja_assets/main.mo
import Array "mo:base/Array";
import Blob "mo:base/Blob";
import Cycles "mo:base/ExperimentalCycles";
import Error "mo:base/Error";
import HashMap "mo:base/HashMap";
import Iter "mo:base/Iter";
import Nat "mo:base/Nat";
import Nat32 "mo:base/Nat32";
import Principal "mo:base/Principal";
import Text "mo:base/Text";

actor {
  // Remove 'stable' keyword since HashMap is not a stable type
  private var store = HashMap.HashMap<Text, Blob>(0, Text.equal, Text.hash);

  // Stable storage for upgrade hooks
  private stable var storeEntries : [(Text, Blob)] = [];

  // Pre-upgrade hook to serialize HashMap into stable storage
  system func preupgrade() {
    storeEntries := Iter.toArray(store.entries());
  };

  // Post-upgrade hook to deserialize stable storage back into HashMap
  system func postupgrade() {
    store := HashMap.fromIter<Text, Blob>(storeEntries.vals(), 0, Text.equal, Text.hash);
    storeEntries := []; // Clear stable storage after upgrade
  };

  public func storeAsset(key : Text, content : Blob) : async () {
    store.put(key, content);
  };

  public query func getAsset(key : Text) : async ?Blob {
    store.get(key)
  };

  public query func getAssetSize() : async Nat32 {
    Nat32.fromNat(store.size())
  };

  // Fixed <system> annotation syntax
  public shared func wallet_receive() : async <system> () {
    let amount = Cycles.available();
    let accepted = Cycles.accept(amount);
    assert (accepted == amount);
  };
};